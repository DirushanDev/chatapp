<?php

namespace App\Http\Controllers\Chat;

use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Msg;
use App\Models\User;
use App\Models\Frnd;
use Illuminate\Support\Facades\Auth;

class Chatmsg extends Controller
{
    public function chatmsg(Request $request)
    {
        $receiver = User::where('name', $request->receiver_name)->first();
        $receiver_id = $receiver->id;
        $sender_id = auth()->user()->id;

        $isFriend = Frnd::where(function ($query) use ($sender_id, $receiver_id) {
            $query->where('frnd_request_sender_id', $sender_id)
                  ->where('frnd_request_receiver_id', $receiver_id)
                  ->where('status', 'accepted');
        })
        ->orWhere(function ($query) use ($sender_id, $receiver_id) {
            $query->where('frnd_request_sender_id', $receiver_id)
                  ->where('frnd_request_receiver_id', $sender_id)
                  ->where('status', 'accepted');
        })
        ->exists();

        if ($isFriend) {
            $mymsg = Msg::where('sender_id', $sender_id)
                        ->where('receiver_id', $receiver_id)
                        ->orderBy('created_at')
                        ->get();
            $receivermsg = Msg::where('receiver_id', $sender_id)
                              ->where('sender_id', $receiver_id)
                              ->orderBy('created_at')
                              ->get();

            return view('Chat.chatbox', compact('mymsg', 'receivermsg', 'receiver_id', 'sender_id'));
        } else {
            return view('Error.Ermsg');
        }
    }

    public function savemsg(Request $request)
    {
       
        $chat = new Msg();
        $chat->sender_id = auth()->user()->id;
        $chat->receiver_id = $request->receiver_id;
        $chat->msg = Crypt::encryptString($request->msg);
        $chat->status = 'unread';
        $chat->save();

        return redirect()->route('chat', ['receiver_name' => User::find($chat->receiver_id)->name]);
    }
}
