<?php

namespace App\Http\Controllers;

use App\Chat;
use App\Task;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;


class BuddyController extends Controller
{
    //
    public function index()
    {
        $users=User::all();
        return view('buddy.index',compact('users'));
    }

    public function chat(User $user){

        $id=$user->id;
        $sender=Auth::user();
        $sender->load('chats.user');
        $chats=$sender->chats()->where('receiver_id',$id)->get();
      //// $chats =Chat::where('receiver_id',$id)->get();
        return view('buddy.chat',compact('user','chats'));

    }


    public function store(Request $request,$userid){

        $this->validate($request, [
            'message' => 'required|min:1',
        ]);

            $chat=new Chat;
            $chat->message= $request->message;
            $chat->user_id=Auth::user()->id;
            $chat->receiver_id=$userid;

            $chat->save();

            return back();
    }

}
