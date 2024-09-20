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
            $query->where('user_id', $user->id)
            ->orWhere('type', 'quote');
        })
           ->orderBy('created_at', 'desc')
           ->get();
           return view('transporter.dashboard.notifications.index', compact('notif'));
       }elseif ($user->type == 'user') 
       {
        $notif = Notification::where('user_id', Auth::id())->get(); 
        return view('front.dashboard.notifications.index', compact('notif'));
    }
    elseif ($user->type == 'admin') 
    {
        $notif = Notification::where('user_id', Auth::id())->get(); 
        return view('admin.notifications.index', compact('notif'));
    }

}

public function store(Request $request)
{
    $request->validate([
        'from_user_id' => 'required|exists:users,id',
        'user_id' => 'required|exists:users,id',
        'title' => 'required|string|max:255',
        'message' => 'required|string',
        'type' => 'nullable|string|max:255',
    ]);

    Notification::create($request->all());

    return redirect()->back()->with('success', 'Notification sent successfully.');
}

public function show(Notification $notification)
{
    $user = Auth::user();

    if ($notification->user_id == Auth::id() && $notification->type!='quote') {
        $notification->update([
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
