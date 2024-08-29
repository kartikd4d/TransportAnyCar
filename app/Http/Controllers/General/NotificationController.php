<?php

namespace App\Http\Controllers\General;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notification;

class NotificationController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        if ($user->type == 'car_transporter')
        {
           $notif = Notification::where(function ($query) use ($user) {
            $query->where('user_id_to', $user->id)
            ->orWhere('type', 'quote');
        })
           ->orderBy('created_at', 'desc')
           ->get();
           return view('transporter.dashboard.notifications.index', compact('notif'));
       }elseif ($user->type == 'user') 
       {
        $notif = Notification::where('user_id_to', Auth::id())->get(); 
        return view('front.dashboard.notifications.index', compact('notif'));
    }
    elseif ($user->type == 'admin') 
    {
        $notif = Notification::where('user_id_to', Auth::id())->get(); 
        return view('admin.notifications.index', compact('notif'));
    }

}

public function store(Request $request)
{
    $request->validate([
        'user_id_from' => 'required|exists:users,id',
        'user_id_to' => 'required|exists:users,id',
        'subject' => 'required|string|max:255',
        'full_message_html' => 'required|string',
        'page_url' => 'required|string|max:255',
        'type' => 'nullable|string|max:255',
    ]);

    Notification::create($request->all());

    return redirect()->back()->with('success', 'Notification sent successfully.');
}

public function show(Notification $notification)
{
    $user = Auth::user();

    if ($notification->user_id_to == Auth::id() && !$notification->status &&$notification->type!='quote') {
        $notification->update([
            'status' => true,
            'seen_at' => now(),
        ]);
    }
    if ($user->type == 'car_transporter')
    {
        return view('transporter.dashboard.notifications.show', compact('notification'));
    }elseif ($user->type == 'user') 
    {
        return view('front.dashboard.notifications.show', compact('notification'));

    }elseif ($user->type == 'admin') 
    {
        return view('admin.notifications.show', compact('notification'));

    }

}
}
