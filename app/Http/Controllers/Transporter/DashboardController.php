<?php

namespace App\Http\Controllers\Transporter;

use App\Feedback;
use App\Http\Controllers\WebController;
use App\Message;
use App\QuoteByTransporter;
use App\Thread;
use App\User;
use App\UserQuote;
use App\TransactionHistory;
use App\Notification;
use Carbon\Carbon;
use App\Services\EmailService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\App;
use App\SaveSearch;

class DashboardController extends WebController
{
    public $chat_obj;
    public $user_obj;
    public $thread_obj;
    protected $emailService;
    public function __construct(EmailService $emailService)
    {
        $this->thread_obj = new Thread();
        $this->chat_obj = new Message();
        $this->user_obj = new User();
        $this->emailService = $emailService;
    }

    public function dashboard(Request $request)
    {
        $user_data = Auth::guard('transporter')->user();
        $this_month = Carbon::now()->month;
        $last_month = Carbon::now()->subMonth()->month;
        $this_year = Carbon::now()->year;
        // save last visit time of transporter
        $user_data->last_visited_at = now();
        $user_data->save();

        $my_quotes = QuoteByTransporter::where('user_id', $user_data->id)->get();
        $quotes = UserQuote::whereIn('id', $my_quotes->pluck('user_quote_id'))->get();
        $params['bids_count'] = $my_quotes->count();
        $params['won_count'] = $my_quotes->where('status', 'accept')->count();
        $params['jobs_completed_count'] = $quotes->where('status', 'completed')->count();
        $params['total_earning_count'] = $my_quotes->where('status', 'accept')->whereIn('user_quote_id', $quotes->where('status', 'completed')->pluck('id')->toArray())->sum('transporter_payment');
        $params['user'] = $user_data;
        //Total Earnings
        $accept_quote = QuoteByTransporter::where('status', 'accept')->where('user_id', $user_data->id)->get();
        $total_ids = $accept_quote->pluck('user_quote_id')->toArray();
        $total_distance = UserQuote::whereIn('id', $total_ids)
            ->sum('distance');
        $total_distance = $total_distance >= 1000 ? round($total_distance / 1000, 1) . 'K' : round($total_distance, 1);
        $total_duration = UserQuote::whereIn('id', $total_ids)
            ->sum('duration');
        $hours = intdiv($total_duration, 60);
        $minutes = $total_duration % 60;
        $total_duration = $hours . ' hrs ' . $minutes . ' mins';
        $this_month_user_quote_ids = $accept_quote->pluck('user_quote_id')->toArray();
        if (!empty($this_month_user_quote_ids)) {
            $this_month_user_quote = UserQuote::whereIn('id', $this_month_user_quote_ids)
                ->where('status', 'completed')
                ->whereMonth('created_at', $this_month)
                ->whereYear('created_at', $this_year)
                ->get();
            if ($this_month_user_quote->isNotEmpty()) {
                $user_quote_ids = $this_month_user_quote->pluck('id')->toArray();
                $this_month_earnings = QuoteByTransporter::whereIn('user_quote_id', $user_quote_ids)->where('user_id', $user_data->id)
                    ->sum('transporter_payment');
            } else {
                $this_month_earnings = 0;
            }
        } else {
            $this_month_earnings = 0;
        }
        $last_month_user_quote_ids = $accept_quote->pluck('user_quote_id')->toArray();
        if (!empty($last_month_user_quote_ids)) {
            $last_month_user_quote = UserQuote::whereIn('id', $last_month_user_quote_ids)
                ->where('status', 'completed')
                ->whereMonth('created_at', $last_month)
                ->whereYear('created_at', $this_year)
                ->get();
            if ($last_month_user_quote->isNotEmpty()) {
                $user_quote_ids_last_month = $last_month_user_quote->pluck('id')->toArray();
                $last_month_earnings = QuoteByTransporter::whereIn('user_quote_id', $user_quote_ids_last_month)->where('user_id', $user_data->id)
                    ->sum('transporter_payment');
            } else {
                $last_month_earnings = 0;
            }
        } else {
            $last_month_earnings = 0;
        }
        $start_of_last_week = Carbon::now()->subWeek()->startOfWeek();
        $end_of_last_week = Carbon::now()->subWeek()->endOfWeek();
        $previous_week_user_quote = UserQuote::whereIn('id', $accept_quote->pluck('user_quote_id'))
            ->where('status', 'completed')
            ->whereBetween('created_at', [$start_of_last_week, $end_of_last_week])
            ->get();
        if ($previous_week_user_quote->isNotEmpty()) {
            $user_quote_ids_last_week = $previous_week_user_quote->pluck('id')->toArray();
            $previous_week_earnings = QuoteByTransporter::whereIn('user_quote_id', $user_quote_ids_last_week)->where('user_id', $user_data->id)
                ->sum('transporter_payment');
        } else {
            $previous_week_earnings = 0;
        }
        $increase_from_previous_week = $previous_week_earnings / 100;
        $params['this_month_earnings'] = $this_month_earnings;
        $params['total_distance'] = $total_distance;
        $params['total_duration'] = $total_duration;
        $params['last_month_earnings'] = $last_month_earnings;
        $params['increase_from_previous_week'] = $increase_from_previous_week;
        return view('transporter.dashboard.index', $params);
    }

    // public function TotalEarning()
    // {
    //     $user = Auth::guard('transporter')->user();

    //     $accept_quote = QuoteByTransporter::where('status', 'accept')->where('user_id', $user->id)->get();
    //     $user_quote = UserQuote::whereIn('id', $accept_quote->pluck('user_quote_id'))->where('status', 'completed')->get();
    //     $earnings = QuoteByTransporter::whereIn('user_quote_id', $user_quote->pluck('id'))->where('user_id',$user->id)->select(DB::raw('date(created_at) as orderdate'), DB::raw('sum(transporter_payment) as grand_total1'))->groupBy('orderdate')->get();
    //     $maindata = [];
    //     if (count($earnings) > 0) {
    //         foreach ($earnings as $earning) {
    //             $detail = [];
    //             $detail[] = strtotime("+1 day", strtotime($earning->orderdate)) * 1000;
    //             $detail[] = $earning->grand_total1;
    //             $maindata[] = $detail;
    //         }
    //     }
    //     return $maindata;
    // }

    public function TotalEarning()
    {
        $user = Auth::guard('transporter')->user();

        $accept_quote = QuoteByTransporter::where('status', 'accept')
            ->where('user_id', $user->id)
            ->get();

        $user_quote = UserQuote::whereIn('id', $accept_quote->pluck('user_quote_id'))
            ->where('status', 'completed')
            ->get();

        $earnings = QuoteByTransporter::whereIn('user_quote_id', $user_quote->pluck('id'))
            ->where('user_id', $user->id)
            ->select(DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'), DB::raw('SUM(transporter_payment) as total'))
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // Initialize an array for months with zero values
        $months = [
            'Jan' => 0,
            'Feb' => 0,
            'Mar' => 0,
            'Apr' => 0,
            'May' => 0,
            'Jun' => 0,
            'Jul' => 0,
            'Aug' => 0,
            'Sep' => 0,
            'Oct' => 0,
            'Nov' => 0,
            'Dec' => 0
        ];

        // Populate months with actual data
        foreach ($earnings as $earning) {
            $monthName = date('M', strtotime($earning->month . '-01'));
            if (isset($months[$monthName])) {
                $months[$monthName] = (float) $earning->total;
            }
        }

        // Convert to the desired format
        $maindata = [];
        foreach ($months as $month => $total) {
            $maindata[] = [$month, $total];
        }

        return $maindata;
    }

    public function TotalAnalytics()
    {
        $user = Auth::guard('transporter')->user();
        $accept_quote = QuoteByTransporter::where('status', 'accept')->where('user_id', $user->id)->get();
        $user_quote = UserQuote::whereIn('id', $accept_quote->pluck('user_quote_id'))->where('status', 'completed')->get();
        $cancel_quote = QuoteByTransporter::where('status', 'rejected')->where('user_id', $user->id)->get();
        $earnings = 1;
        $bids_placed = QuoteByTransporter::where('user_id', $user->id)->count();
        $maindata = [
            'cancelled' => $cancel_quote->count(),
            'jobs_won' => $accept_quote->count(),
            'bids_placed' => $bids_placed
        ];

        return $maindata;
    }

    public function profile()
    {
        $user = \Auth::guard('transporter')->user();
        // save last visit time of transporter
        $user->last_visited_at = now();
        $user->save();
        $my_quotes = QuoteByTransporter::where('user_id', $user->id)->get();
        $quotes = UserQuote::whereIn('id', $my_quotes->pluck('user_quote_id'))->get();
        $jobs_completed_count = $my_quotes->where('status', 'accept')->count();
        $total_earning_count = $my_quotes->where('status', 'accept')->whereIn('user_quote_id', $quotes->where('status', 'completed')->pluck('id')->toArray())->sum('transporter_payment');
        // dd($user);
        // die;
        return view('transporter.dashboard.profile', ['user' => $user, 'jobs_completed_count' => $jobs_completed_count, 'total_earning_count' => $total_earning_count]);
    }

    public function messages()
    {
        $user = Auth::guard('transporter')->user();
        $user_id = $user->id;

        $c_insatnce = $this->thread_obj->with(['message_latest'])->select("threads.*", 'u.name as user_name', 'u.profile_image')->TotalUnreadMessageCount(0)
            ->leftJoin("users as u", 'u.id', '=', 'threads.user_id')
            ->where("is_active", "y")
            ->where(function ($query) use ($user_id) {
                $query->where('threads.user_id', $user_id)
                    ->orWhere('threads.friend_id', $user_id);
            })
            ->orderBy('last_msg_update_time', 'DESC');
        $chats = $c_insatnce->get();

        //dd($chats);
        //dd($chats->TotalUnreadMessageCount);
        // $chats = $this->chat_obj->select('messages.*','f.name','f.id as user_id','f.profile_image')
        //     //->select(DB::raw("select count(cm.from_user) from chat_messages as cm where cm.from_user_id = chat_messages.from_user_id group by  as unread_message"))
        //     ->leftJoin('users as f','f.id','=','chat_messages.from_user_id')
        //     ->where('to_user_id', '=', $user_id)
        //     ->OrderBy('total_unread','DESC')
        //     ->groupBy('from_user_id')
        //     ->get();

        $latest_chat = $chats->first();
        return view('transporter.dashboard.messages')->with(compact('chats', 'latest_chat'));
    }

    public function feedback()
    {
        $user_data = Auth::guard('transporter')->user();
        $my_quotes = QuoteByTransporter::where('user_id', $user_data->id)->pluck('id');
        $quotes = TransactionHistory::whereIn('quote_by_transporter_id', $my_quotes)->get();

        $totalDistance = $quotes->sum(function ($transaction) {
            if ($transaction->quote) {
                $distanceString = $transaction->quote->distance;
                $cleanedDistance = str_replace(['mi', ',', ' '], '', $distanceString);
                return is_numeric($cleanedDistance) ? (float)$cleanedDistance : 0;
            }
            return 0;
        });
       

        $totalDistanceFormatted = number_format($totalDistance);
        // return $totalDistanceFormatted;
        $completedCount = $quotes->filter(function ($transaction) {
            return $transaction->quote && $transaction->quote->status == 'completed';
        })->count();

        //     $totalAmount = TransactionHistory::whereIn('quote_by_transporter_id', $my_quotes)
        // ->sum('amount');
        $total_earning = $quotes->sum('amount');
        // return$quotes;
        $rating_average = Feedback::whereIn('quote_by_transporter_id', $my_quotes)
            ->selectRaw('(AVG(communication) + AVG(punctuality) + AVG(care_of_good) + AVG(professionalism)) / 4 as overall_avg')
            ->first();

        $quote_ids = Feedback::whereIn('quote_by_transporter_id', $my_quotes)
            ->with('quote_by_transporter.quote')
            ->get()
            ->pluck('quote_by_transporter.quote.id');

        $params['user'] = $user_data;
        $params['feedback'] = Feedback::whereIn('quote_by_transporter_id', $my_quotes)->with('quote_by_transporter.quote')->get();
        $params['completed_job'] =  $completedCount;
        $params['distance'] = $totalDistanceFormatted;
        $params['total_earning'] = $total_earning;

        $customRequest = new Request([
            'type' => 'feedback'
        ]);

        // Call notificationStatus with the custom request
        $this->notificationStatus($customRequest);

        return view('transporter.dashboard.feedback', $params);
    }

    public function feedback_listing(Request $request)
    {
        $user_data = Auth::guard('transporter')->user();
        $my_quotes = QuoteByTransporter::where('user_id', $user_data->id)->pluck('id');
        $feedbacks = Feedback::query();
        $feedbacks = $feedbacks->whereIn('quote_by_transporter_id', $my_quotes);
        $feedbacks = $feedbacks->paginate(10);
        $params['html'] = view('transporter.dashboard.partial.feedback_listing', compact('feedbacks'))->render();
        if ($request->ajax()) {
            return response()->json(['success' => true, 'message' => 'Job find successfully', 'data' => $params]);
        }
    }

    public function currentJobs($id = null)
    {
        if ($id) {
            try {
                $quote = QuoteByTransporter::with([
                    'getTransporters',
                    'quote.user',
                    'quote.quotationDetail'
                ])->where('id', $id)->first();
                $friend_id = $quote->quote->user_id ?? 0;
                if (!$quote) {
                    return view('transporter.dashboard.current_jobs');
                }
                $user_job = $quote->quote;
                $transporter = $quote->getTransporters;
                $user = $user_job->user ?? null;
                $quotation_detail = $user_job->quotationDetail ?? null;
                $lastVisitedAt = $user->last_visited_at->timezone('Europe/London');
                $last_visited_at = $this->formatLastVisitedAt($lastVisitedAt);
                if ($quotation_detail && $quotation_detail->created_at) {
                    $formattedDilveryDate = Carbon::createFromFormat('Y-m-d H:i:s', $quotation_detail->created_at)
                        ->setTimezone('Europe/London')
                        ->format('F d, H:i');
                } else {
                    $formattedDilveryDate = null;
                }
                return view('transporter.dashboard.current_jobs_detail', compact('quote', 'user_job', 'transporter', 'user', 'quotation_detail', 'last_visited_at', 'formattedDilveryDate', 'friend_id'));
            } catch (\Exception $e) {
                \Log::error('Error fetching quote details: ' . $e->getMessage());
                return view('transporter.dashboard.current_jobs');
            }
        } else {
            return view('transporter.dashboard.current_jobs');
        }
    }

    private function formatLastVisitedAt(Carbon $lastVisitedAt)
    {
        $now = Carbon::now('Europe/London');

        if ($lastVisitedAt->isToday()) {
            return 'Last seen Today ' . $lastVisitedAt->format('H:i');
        } elseif ($lastVisitedAt->isYesterday()) {
            return 'Last seen Yesterday ' . $lastVisitedAt->format('H:i');
        } else {
            return 'Last seen ' . $lastVisitedAt->format('d M Y H:i');
        }
    }

    public function newJobs()
    {
        $user_data = \Auth::guard('transporter')->user();
        $user_quote = QuoteByTransporter::where('user_id', $user_data->id)->pluck('user_quote_id');
        $quotes = UserQuote::with('user')->whereNotIn('id', $user_quote)->where('status', 'pending')->latest()->get();
        return view('transporter.dashboard.new_jobs', ['quotes' => $quotes]);
    }

    //  d4d developer - k
    public function newJobsNew()
    {
        $user_data = \Auth::guard('transporter')->user();
        $user_data->last_visited_on_find_job_page = Carbon::now('Europe/London');
        $user_data->save();
        $user_quote = QuoteByTransporter::where('user_id', $user_data->id)->pluck('user_quote_id');
        $quotes = UserQuote::with(['user', 'watchlist', 'quoteByTransporter' => function ($query) use ($user_data) {
            $query->where('user_id', $user_data->id); // Assuming 'transporter_id' is the field
        }])
            // ->whereNotIn('id', $user_quote)
            ->where(function ($query) {
                $query->where('status', 'pending')
                    ->orWhere('status', 'approved');
            })
            ->addSelect([
                'transporter_quotes_count' => QuoteByTransporter::selectRaw('COUNT(*)')
                    ->whereColumn('user_quote_id', 'user_quotes.id'),
                'lowest_bid' => QuoteByTransporter::selectRaw('MIN(CAST(transporter_payment AS UNSIGNED))')
                    ->whereColumn('user_quote_id', 'user_quotes.id')
            ])
            ->latest()
            ->paginate(50);
        // return $quotes;
        $document_status = $user_data->is_status;
        return view('transporter.dashboard.new_jobs_new', ['quotes' => $quotes, 'documentStatus' => $document_status]);
    }
    // end d4d developer - k

    // d4d developer - k
    public function submitOffer(Request $request)
    {
        $user_data = \Auth::guard('transporter')->user();
        //dump($user_data);
        // Validate the request
        $validator = \Validator::make($request->all(), [
            'amount' => [
                'required',
            ],

            'quote_id' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }
        $offer = $request->input('amount');
        if (!$offer || !is_numeric($offer)) {
            return response()->json(['success' => false]);
        }

        $quoteDetails = calculateCustomerQuote((float) $offer);
        // $quote = QuoteByTransporter::create([
        //     'user_id' => $user_data->id,
        //     'user_quote_id' => $request->quote_id,
        //     'price' => $quoteDetails['customer_quote'],
        //     'deposit' => $quoteDetails['deposit'],
        //     'transporter_payment' => $quoteDetails['transporter_payment'],
        //     'message' => $request->message,
        // ]);

        $quote = QuoteByTransporter::where('user_quote_id', $request->quote_id)
            ->where('user_id', $user_data->id)
            ->first();

        if ($quote) {
            // Update the existing offer
            $quote->update([
                'price' => $quoteDetails['customer_quote'],
                'deposit' => $quoteDetails['deposit'],
                'transporter_payment' => $quoteDetails['transporter_payment'],
                'message' => $request->message,
            ]);
        } else {
            // Create a new offer if it doesn't exist
            $quote = QuoteByTransporter::create([
                'user_id' => $user_data->id,
                'user_quote_id' => $request->quote_id,
                'price' => $quoteDetails['customer_quote'],
                'deposit' => $quoteDetails['deposit'],
                'transporter_payment' => $quoteDetails['transporter_payment'],
                'message' => $request->message,
            ]);
        }

        $friend_id = $quote->quote->user_id ?? 0;
        $quoteId = $request['quote_id'];
        $isChatExist = Thread::where(function ($q) use ($friend_id) {
            $q->where('user_id', '=', $friend_id)
                ->orWhere('friend_id', '=', $friend_id);
        })->where(function ($q) use ($user_data) {
            $q->where('user_id', '=', $user_data->id)
                ->orWhere('friend_id', '=', $user_data->id);
        })->where('user_quote_id', '=', $quoteId)
            ->first();
        if (empty($isChatExist)) {
            $thread = Thread::create([
                'user_id' => $friend_id,
                'friend_id' => $user_data->id,
                'user_quote_id' => $request->quote_id,
                'last_msg_update_time' => date('Y-m-d H:i:s'),
            ]);
            if ($thread && isset($thread->id)) {
                $message = Message::create([
                    'threads_id' => $thread->id,
                    'sender_id' => $user_data->id,
                    'receiver_id' => $friend_id,
                    'message' => $request->message ?? null,
                    'type' => "message",
                ]);
            } else {
                echo "Failed to create thread.";
            }
        }
        try {
            if ($quote->quote->user->job_email_preference) {
                $maildata['email'] = $quote->quote->user->email;
                $thread_id = isset($thread->id) ? $thread->id : 0;
                //$maildata['email'] = 'info@transportanycar.com';
                $mailSubject = 'New Transport Quote for £' . $quoteDetails['customer_quote'] . ' to Deliver Your ' . $quote->quote->vehicle_make . ' ' . $quote->quote->vehicle_model;
                if (!empty($quote->quote->vehicle_make_1) && !empty($quote->quote->vehicle_model_1)) {
                    $mailSubject .= ' / ' . $quote->quote->vehicle_make_1 . ' ' . $quote->quote->vehicle_model_1;
                }
                $htmlContent = view('mail.General.user-new-offer-received', ['data' => $quote, 'thread_id' => $thread_id])->render();
                $this->emailService->sendEmail($maildata['email'], $htmlContent, $mailSubject);

                // Call create_notification to notify the user
                create_notification(
                    $quote->quote->user->id,
                    $user_data->id,
                    $quote->quote->id,
                    'You have a new quote!',
                    $user_data->username . ' has sent you a quote for £' . $quoteDetails['customer_quote'],  // Message of the notification
                    'quote',
                );
            } else {
                Log::info('User with email ' . $quote->quote->user->email . ' has opted out of receiving emails. Quotation email not sent.');
            }
        } catch (\Exception $ex) {
            Log::error('Error sending email: ' . $ex->getMessage());
        }
        // Run the outbid notification command
        if (App::environment('production')) {
            $command = '/usr/local/bin/php /home/pfltvaho/public_html/artisan send:outbid-notifications ' . $request->quote_id . ' ' . $quoteDetails['transporter_payment'] . ' ' . $user_data->id;
        } elseif ((App::environment('staging'))) {
            $command = '/usr/local/bin/php /home/pfltvaho/staging.transportanycar.com/artisan send:outbid-notifications ' . $request->quote_id . ' ' . $quoteDetails['transporter_payment'] . ' ' . $user_data->id;
        } else {
            $command = '/usr/bin/php /var/www/laravel/car-app/artisan send:outbid-notifications ' . $request->quote_id . ' ' . $quoteDetails['transporter_payment'] . ' ' . $user_data->id;
        }
        exec($command, $output, $returnVar);

        if ($returnVar !== 0) {
            // Handle the error based on the return code
            Log::error('Error running send:outbid-notifications command. Return code: ' . $returnVar);
        }

        return response()->json(['success' => true]);
    }
    // end d4d developer - k

    public function updateProfileImage(Request $request)
    {
        $user_data = Auth::guard('transporter')->user();
        $thumb_upload = upload_base_64_img($request->image, get_constants('upload_paths.user_profile_image'));
        if ($thumb_upload) {
            un_link_file($user_data->profile_image);
            $user_data->profile_image = $thumb_upload;
            $user_data->save();
            if ($request->ajax()) {
                return response()->json(['success' => true, 'message' => 'Profile image upload successfully']);
            }
        }
        return response()->json(['success' => false, 'message' => 'something went wrong please try again']);
    }

    public function updateProfileDocs(Request $request)
    {
        $user_data = Auth::guard('transporter')->user();
        if ($request->hasFile('driver_license')) {
            $driver_license = upload_file('driver_license', 'user_profile_image');
            $user_data->driver_license = $driver_license ?? null;
        }
        if ($request->hasFile('goods_in_transit_insurance')) {
            $goods_in_transit_insurance = upload_file('goods_in_transit_insurance', 'user_profile_image');
            $user_data->goods_in_transit_insurance = $goods_in_transit_insurance ?? null;
        }
        if ($request->hasFile('driver_license') || $request->hasFile('goods_in_transit_insurance')) {
            $user_data->is_status = 'pending';
        }
        $user_data->save();

        return response()->json(['success' => true, 'message' => 'Uploaded successfully']);
    }

    public function updateEmailPreference(Request $request)
    {
        $user = Auth::guard('transporter')->user();

        if ($user) {
            if ($request->email_type == 'job_alert') {
                $status = $user->update(['job_email_preference' => $request->value]);

                if ($status) {
                    return response()->json(['status' => true,  'message' => 'Preference updated successfully.']);
                } else {
                    return response()->json(['status' => false, 'message' => 'Failed to update preference.']);
                }
            } else {
                return response()->json(['status' => false, 'message' => 'Invalid email type.']);
            }
        } else {
            return response()->json(['status' => false, 'message' => 'User not authenticated.']);
        }
    }

    public function profilePost(Request $request)
    {
        $user_data = Auth::guard('transporter')->user();
        $user_data->email = $request->email;
        $user_data->name = $request->company_name;
        $user_data->business_description = $request->business_description;
        $user_data->insurance_cover = $request->insurance_cover;
        $user_data->address = $request->address;
        $user_data->country_code = $request->country_code;
        $user_data->mobile = $request->mobile;
        if ($request->hasFile('driver_license')) {
            $driver_license = upload_file('driver_license', 'user_profile_image');
            $user_data->driver_license = $driver_license ?? null;
        }
        if ($request->hasFile('motor_trade_insurance')) {
            $motor_trade_insurance = upload_file('motor_trade_insurance', 'user_profile_image');
            $user_data->motor_trade_insurance = $motor_trade_insurance ?? null;
        }
        if ($request->hasFile('goods_in_transit_insurance')) {
            $goods_in_transit_insurance = upload_file('goods_in_transit_insurance', 'user_profile_image');
            $user_data->goods_in_transit_insurance = $goods_in_transit_insurance ?? null;
        }
        if ($request->hasFile('motor_trade_insurance') || $request->hasFile('driver_license') || $request->hasFile('goods_in_transit_insurance')) {
            $user_data->is_status = 'pending';
        }
        if ($request->has('payment_methods')) {
            $user_data->payment_methods = implode(',', $request->payment_methods);
        } else {
            $user_data->payment_methods = null;
        }
        if (!empty($request->npassword) && isset($request->npassword)) {
            $user_data->password = $request->npassword;
        }
        $user_data->save();

        success_session('Profile updated successfully');
        return redirect()->back();
    }

    public function help_and_support(Request $request)
    {
        try {
            $maildata['email'] = 'support@transportanycar.com';
            //$maildata['email'] = 'subham.k@ptiwebtech.com';
            $mailSubject = 'Help & Support Transporter';
            $htmlContent = view('mail.General.help_and_support', ['data' => $request])->render();
            $this->emailService->sendEmail($maildata['email'], $htmlContent, $mailSubject);
            return response()->json(['success' => true, 'message' => 'Message sent. we will contact ASAP.']);
        } catch (\Exception $ex) {
            Log::error('Error sending email: ' . $ex->getMessage());
            return response()->json(['success' => false, 'message' => 'Something went wrong!.. try again!.']);
        }
    }

    // d4d developer - k
    public function find_job(Request $request)
    {
        if (empty($request->search_pick_up_area)) {
            return response()->json(['success' => false, 'message' => 'Currently no jobs to show']);
        }

        $pickUpResponse = Http::get('https://maps.googleapis.com/maps/api/geocode/json', [
            'address' => $request->input('search_pick_up_area'),
            'key' => config('constants.google_map_key'),
        ]);
        $pickUpData = $pickUpResponse->json();
        if ($pickUpData['status'] === 'OK') {
            $pick_up_latitude = $pickUpData['results'][0]['geometry']['location']['lat'];
            $pick_up_longitude = $pickUpData['results'][0]['geometry']['location']['lng'];
        } else {
            return response()->json(['success' => false, 'message' => 'Currently no jobs to show']);
        }
        $drop_off_latitude = null;
        $drop_off_longitude = null;
        if ($request->search_drop_off_area && $request->search_drop_off_area != 'Anywhere') {
            $dropOffResponse = Http::get('https://maps.googleapis.com/maps/api/geocode/json', [
                'address' => $request->input('search_drop_off_area'),
                'key' => config('constants.google_map_key'),
            ]);
            $dropOffData = $dropOffResponse->json();
            if ($dropOffData['status'] === 'OK') {
                $drop_off_latitude = $dropOffData['results'][0]['geometry']['location']['lat'];
                $drop_off_longitude = $dropOffData['results'][0]['geometry']['location']['lng'];
            } else {
                return response()->json(['success' => false, 'message' => 'Currently no jobs to show']);
            }
        }

        $maxDistance = config('constants.max_range_km');
        $user_data = Auth::guard('transporter')->user();
        $my_quotes = QuoteByTransporter::where('user_id', $user_data->id)->get();

        // Get IDs of user quotes that have been quoted by the transporter
        $my_quote_ids = $my_quotes->pluck('user_quote_id');

        // $subQuery = UserQuote::query()
        //     ->join('users', 'users.id', '=', 'user_quotes.user_id')
        //     ->leftJoin('quote_by_transpoters', 'quote_by_transpoters.user_quote_id', '=', 'user_quotes.id')->get();
        // return response()->json(['success' => true, 'message' => 'Job find successfully', 'data' => $subQuery]);

        $subQuery = UserQuote::query()
            ->join('users', 'users.id', '=', 'user_quotes.user_id')
            ->leftJoin('quote_by_transpoters', function ($join) {
                $join->on('quote_by_transpoters.user_quote_id', '=', 'user_quotes.id')
                    ->whereRaw('quote_by_transpoters.user_id = ?', [auth()->id()]); // Use DB::raw with a where condition
            })
            // ->whereNotIn('user_quotes.id', $my_quote_ids)
            ->where(function ($query) {
                $query->where('user_quotes.status', 'pending')
                    ->orWhere('user_quotes.status', 'approved');
            });
        if ($drop_off_latitude) {
            // return "yessssssssss";
            $subQuery->select(
                'quote_by_transpoters.user_id as tranporterId',
                'user_quotes.*',
                'users.profile_image',
                'users.username as name',
                'users.address',
                'users.town',
                'users.county',
                \DB::raw("( 6371 * acos( cos( radians($pick_up_latitude) ) * cos( radians( pickup_lat ) ) * cos( radians( pickup_lng ) - radians($pick_up_longitude) ) + sin( radians($pick_up_latitude) ) * sin( radians( pickup_lat ) ) ) ) AS distance_pickup"),
                \DB::raw("( 6371 * acos( cos( radians($drop_off_latitude) ) * cos( radians( drop_lat ) ) * cos( radians( drop_lng ) - radians($drop_off_longitude) ) + sin( radians($drop_off_latitude) ) * sin( radians( drop_lat ) ) ) ) AS distance_drop_off"),
                \DB::raw("COUNT(quote_by_transpoters.id) as quotes_count"), // Count the number of quotes by transporters
                \DB::raw("MIN(quote_by_transpoters.transporter_payment) as lowest_bid"), // Get the lowest bid
                DB::raw("(CASE 
                WHEN (SELECT user_id FROM watchlists WHERE user_quote_id = user_quotes.id AND user_id = $user_data->id LIMIT 1) IS NOT NULL THEN 1 ELSE 0 END) AS watchlist_id")
            )
                ->having('distance_pickup', '<=', $maxDistance)
                ->having('distance_drop_off', '<=', $maxDistance);
        } else {
            $subQuery->select(
                'quote_by_transpoters.user_id as tranporterId',
                'user_quotes.*',
                'users.profile_image',
                'users.username as name',
                'users.address',
                'users.town',
                'users.county',
                \DB::raw("( 6371 * acos( cos( radians($pick_up_latitude) ) * cos( radians( pickup_lat ) ) * cos( radians( pickup_lng ) - radians($pick_up_longitude) ) + sin( radians($pick_up_latitude) ) * sin( radians( pickup_lat ) ) ) ) AS distance_pickup"),
                \DB::raw("COUNT(quote_by_transpoters.id) as quotes_count"), // Count the number of quotes by transporters
                \DB::raw("MIN(quote_by_transpoters.transporter_payment) as lowest_bid"), // Get the lowest bid
                DB::raw("(CASE 
                WHEN (SELECT user_id FROM watchlists WHERE user_quote_id = user_quotes.id AND user_id = $user_data->id LIMIT 1) IS NOT NULL THEN 1 ELSE 0 END) AS watchlist_id")
            )
                ->having('distance_pickup', '<=', $maxDistance);
        }

        // Group by user_quote_id to get the count and minimum bid for each
        $subQuery->groupBy('user_quotes.id')
            ->latest();
        // Wrap the subquery with the main query for pagination
        $quotes = \DB::table(\DB::raw("({$subQuery->toSql()}) as sub"))
            ->mergeBindings($subQuery->getQuery())
            ->paginate(20);
        // return ["user"=>$quotes,"userIdLogin"=>auth()->user()->id];
        // return $quotes->watchlist;
        if ($request->ajax()) {
            // Convert dates to DateTime objects if necessary
            foreach ($quotes as $quote) {
                $quote->created_at = \Carbon\Carbon::parse($quote->created_at);
                $quote->updated_at = \Carbon\Carbon::parse($quote->updated_at);
            }

            $pickup = $request->input('search_pick_up_area');
            $dropoff = $request->input('search_drop_off_area') ?? 'Anywhere';
            $html = view('transporter.dashboard.partial.search_job_result', compact('quotes', 'pickup', 'dropoff'))->render();;

            return response()->json(['success' => true, 'message' => 'Job find successfully', 'data' => $html]);
        }
    }
    //end d4d developer - k

    public function my_job(Request $request)
    {
        $is_dashboard = $request->is_dashboard ?? 0;
        $search = $request->search ?? null;
        $type = $request->type;
        $user_data = Auth::guard('transporter')->user();
        $my_quotes = QuoteByTransporter::query();
        $my_quotes = $my_quotes->where('user_id', $user_data->id);
        if ($type == 'won') {
            $my_quotes = $my_quotes->where('status', 'accept');
        } elseif ($type == 'bidding') {
            $my_quotes = $my_quotes->where('status', 'pending');
        } elseif ($type == 'cancel') {
            $my_quotes = $my_quotes->where('status', 'rejected');
        }
        $my_quotes = $my_quotes->get();
        $subQuery = \DB::table('quote_by_transpoters')
            ->select('user_quote_id', \DB::raw('COUNT(*) as quotes_count'), \DB::raw('MIN(transporter_payment) as lowest_bid'))
            ->groupBy('user_quote_id');
        $quotes = UserQuote::query();
        $quotes = UserQuote::query()
            ->join('quote_by_transpoters', 'user_quotes.id', '=', 'quote_by_transpoters.user_quote_id')
            ->joinSub($subQuery, 'sub', function ($join) {
                $join->on('user_quotes.id', '=', 'sub.user_quote_id');
            })
            ->join('threads', function ($join) use ($user_data) {
                $join->on('user_quotes.id', '=', 'threads.user_quote_id')
                    ->where('threads.friend_id', '=', $user_data->id);
            })
            ->whereIn('user_quotes.id', $my_quotes->pluck('user_quote_id'))
            ->where('quote_by_transpoters.user_id', $user_data->id)
            ->groupBy('user_quotes.id') // Use groupBy to avoid duplicates
            ->select('user_quotes.*', 'quote_by_transpoters.id as quote_by_transporter_id', 'quote_by_transpoters.transporter_payment as transporter_payment', 'sub.quotes_count', 'sub.lowest_bid', 'threads.id as thread_id', 'quote_by_transpoters.updated_at as qbt_updated_at', 'quote_by_transpoters.status as qbt_status');

        // Order by created_at descending for bidding to show newest first
        if ($type == 'bidding' || $type == 'all') {
            $quotes = $quotes->where('user_quotes.status', '!=', 'cancelled')
                ->orderBy('quote_by_transpoters.created_at', 'desc');
        }
        if ($search) {
            $quotes = $quotes->where(function ($query) use ($search) {
                $query->where('pickup_postcode', 'like', '%' . $search . '%')->orWhere('drop_postcode', 'like', '%' . $search . '%');
            });
        }
        $quotes = $quotes->paginate(50);
        //dd($quotes);
        $params['html'] = view('transporter.dashboard.partial.current_my_job', compact('quotes', 'type', 'is_dashboard'))->render();
        $params['type'] = $type;
        if ($request->ajax()) {
            return response()->json(['success' => true, 'message' => 'Job find successfully', 'data' => $params]);
        }
    }


    public function editQuoteAmount(Request $request)
    {
        $offer = $request->input('amount');
        if (!$offer || !is_numeric($offer)) {
            return response()->json(['status' => false, 'message' => 'Invalid amount']);
        }
        $user_data = Auth::guard('transporter')->user();
        $quote = UserQuote::find($request->quote_id);
        if ($quote) {
            $quoteDetails = calculateCustomerQuote((float) $offer);
            $quoteByTransporter = QuoteByTransporter::firstOrNew(['user_quote_id' => $quote->id, 'user_id' => $user_data->id]);
            // Store the old price before updating
            $oldPrice = $quoteByTransporter->price;
            $subjectoldPrice = number_format($oldPrice, 0, '.', ',');
            // Update the record with new quote details
            $quoteByTransporter->price = $quoteDetails['customer_quote'];
            $quoteByTransporter->deposit = $quoteDetails['deposit'];
            $quoteByTransporter->transporter_payment = $quoteDetails['transporter_payment'];
            $quoteByTransporter->outbid_notified = 0;
            $quoteByTransporter->save();

            try {
                if ($quote->user->job_email_preference) {
                    $price_reduced = $quoteDetails['customer_quote'] < $oldPrice; // Flag to indicate if the price 
                    $mailSubject = ($price_reduced ? 'Transport Quote Reduced' : 'Transport Quote Increased') . ' from £' . $subjectoldPrice . ' to £' . $quoteDetails['customer_quote'] . ' to Deliver Your ' . $quoteByTransporter->quote->vehicle_make . ' ' . $quoteByTransporter->quote->vehicle_model;
                    if (!empty($quoteByTransporter->quote->vehicle_make_1) && !empty($quoteByTransporter->quote->vehicle_model_1)) {
                        $mailSubject .= ' / ' . $quoteByTransporter->quote->vehicle_make_1 . ' ' . $quoteByTransporter->quote->vehicle_model_1;
                    }
                    $maildata['email'] = $quote->user->email;
                    //$maildata['email'] ='subham.k@ptiwebtech.com';
                    $maildata['old_price'] = $oldPrice;
                    $maildata['new_price'] = $quoteDetails['customer_quote'];
                    $maildata['quote_id'] = $quote->id;
                    $user_data = Auth::guard('transporter')->user();
                    $maildata['transport_name'] = $user_data->username;
                    $maildata['price_reduced'] = $price_reduced;
                    $htmlContent = view('mail.General.reduced-quote-recieced', ['data' => $maildata])->render();
                    $this->emailService->sendEmail($maildata['email'], $htmlContent, $mailSubject);

                    create_notification(
                        $quote->user->id,
                        $user_data->id,
                        $request->quote_id,
                        'You have a new quote!',
                        $user_data->username . ' has sent you a quote for £' . $quoteDetails['customer_quote'],  // Message of the notification
                        'quote',
                    );
                } else {
                    Log::info('User with email ' . $quote->user->email . ' has opted out of receiving emails. Edit quotation email not sent.');
                }
            } catch (\Exception $ex) {
                Log::error('Error sending email: ' . $ex->getMessage());
            }
            if (App::environment('production')) {
                $command = '/usr/local/bin/php /home/pfltvaho/public_html/artisan send:outbid-notifications ' . $request->quote_id . ' ' . $quoteDetails['transporter_payment'] . ' ' . $user_data->id;
            } elseif ((App::environment('staging'))) {
                $command = '/usr/local/bin/php /home/pfltvaho/staging.transportanycar.com/artisan send:outbid-notifications ' . $request->quote_id . ' ' . $quoteDetails['transporter_payment'] . ' ' . $user_data->id;
            } else {
                $command = '/usr/bin/php /var/www/laravel/car-app/artisan send:outbid-notifications ' . $request->quote_id . ' ' . $quoteDetails['transporter_payment'] . ' ' . $user_data->id;
            }
            exec($command, $output, $returnVar);

            if ($returnVar !== 0) {
                // Handle the error based on the return code
                Log::error('Error running send:outbid-notifications command. Return code: ' . $returnVar);
            }
            return response()->json(['status' => true, 'message' => 'Quote amount updated successfully']);
        } else {
            return response()->json(['status' => false, 'message' => 'Quote not found']);
        }
    }

    public function quoteChangeStatus(Request $request)
    {
        $user_data = Auth::guard('transporter')->user();
        $quote = QuoteByTransporter::where(['user_quote_id' => $request->quote_id, 'user_id' => $user_data->id])->first();
        if ($request->ajax()) {
            $quote->update(['status' => $request->status]);
            return response()->json(['success' => true, 'message' => 'Quote ' . $request->status . ' successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'something went wrong!.. Please try again']);
        }
    }

    public function notificationStatus(Request $request)
    {
        $user_data = Auth::guard('transporter')->user();
        if ($request->type == 'message') {
            Notification::where([
                'user_id' => $user_data->id,
                'reference_id' => $request->quote_id,
                'type' => 'message',
            ])->update(['seen' => 0]);
        } elseif ($request->type == 'feedback') {
            Notification::where([
                'user_id' => $user_data->id,
                'type' => 'feedback'
            ])->update(['seen' => 0]);
        } elseif ($request->type == 'won_job') {
            Notification::where([
                'user_id' => $user_data->id,
                'user_quote_id' => $request->quote_id,
                'type' => 'won_job'
            ])->update(['seen' => 0]);
        } elseif ($request->type == 'outbid') {
            Notification::where([
                'user_id' => $user_data->id,
                'user_quote_id' => $request->quote_id,
                'type' => 'outbid'
            ])->update(['seen' => 0]);
        }
        return response()->json(['success' => true,]);
    }

    public function logout()
    {
        $name = getDashboardRouteName();
        Auth::guard('transporter')->logout();
        return redirect()->route($name);
    }
    //d4dDeveloper-r 07/10/2024
    public function saveSearch(Request $request)
    {
        try {
            $data = [
                "user_id" => auth()->user()->id,
                "search_name" => $request->search_name,
                "pick_area" => $request->pick_area,
                "drop_area" => $request->drop_area,
                "email_notification" => $request->emailNtf, // Convert to integer (1 or 0)
            ];

            $saveSearch = SaveSearch::updateOrCreate(
                [
                    'user_id' => $data['user_id'],
                    'pick_area' => $data['pick_area'],
                    'drop_area' => $data['drop_area'],
                ],
                $data // The data to be updated or inserted
            );
            return response(["success" => true, "message" => "Search save successfully!", "data" => []]);
        } catch (\Exception $ex) {
            return response(["success" => false, "message" => $ex->getMessage(), "data" => []]);
        }
    }
    public function saveSearchView()
    {
        $data = SaveSearch::where('user_id', auth()->user()->id)->paginate(50);
        return view('transporter.savedSearch.index', ['savedSearches' => $data]);
    }
    public function saveSearchDlt(Request $request)
    {
        $data = SaveSearch::find($request->id);
        $data->delete();
        return redirect()->back()->with('saveSearchSuccess', 'Item deleted successfully');
    }
}
