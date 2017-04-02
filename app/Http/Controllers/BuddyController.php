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

       $receiver_id=$user->id;
        $sender=Auth::user();
        $sender_id=$sender->id;





//        $sender->load('chats.user');
//        $chats=$sender->chats()->where('receiver_id',$id)->get();
//      //// $chats =Chat::where('receiver_id',$id)->get();
//        $sender_id=Auth::user()->id;
//        $receiver=$user->chats()->where('receiver_id',$sender_id)->get();
//        $small=0;
//        $big=0;
//
//        $y=count($chats);
//        $x=count($receiver);
//
//        if($x>$y)
//        {
//            $big=$x;
//            $small=$y;
//        }
//        else if($y>$x)
//        {
//            $big=$y;
//            $small=$x;
//        }

//        for($i=0,$j=0;$i<$big;)
//        {
//            for( ; $j<$small ;){
//
//                if($receiver[$i]->created_at >$chats[$j]->created_at)
//                {
//
//                    {{$chats[$j]->message ;}}
//                      // return $chats[$j]->message;
//                       $j++;
//
//
//                }
//                else{
//
//                    {{$receiver[$i]->message ;}}
//                   //return $receiver[$i]->message;
//                $i++;
//                }
//            }
//        }


        return view('buddy.chat',compact('user','chats','sender'));

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
