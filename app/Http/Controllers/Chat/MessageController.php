<?php

namespace App\Http\Controllers\Chat;

use App\Http\Controllers\Controller;
use App\Http\Requests\Chat\MessageFormRequest;
use App\Models\Chat\Message;
use App\Models\User;
use App\Notifications\MessageRecivedNotification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    function index() {

        $users = User::all()->where('id','!=',Auth::user()->id) ;
        return view('chat.index',[
            'users'=> $users,
        ]);
    }

    function show(User $user) {
        $to = $user->id;
        $me = Auth::user()->id;
        $users = User::all()->where('id','!=',$me) ;
        $messages = Message::query()->whereRaw("((from_id = $me and to_id = $to) or (from_id = $to and to_id = $me)) ")->orderBy('created_at','DESC')->get()->reverse();
               
        $unreadCount = Message::query()->where('to_id',$me)->groupBy('from_id')->selectRaw("from_id, COUNT(id) as count")->whereRaw("read_at IS NULL")->get()->pluck('count','from_id');
        if( isset($unreadCount[$user->id])){
            Message::query()->where('from_id',$user->id)->where('to_id',$me)->update(['read_at'=>Carbon::now()]);
            unset($unreadCount[$user->id]);
        }
        return view('chat.show',[
            'user'=>$user,
            'users'=> $users,
            'messages'=>$messages,
            'unreadCount' => $unreadCount,
        ]);
    }

    function store(MessageFormRequest $request,User $user) {
        $data = $request->validated();
        $data['from_id'] = Auth::user()->id;
        $data['to_id'] = $user->id;
        $message = Message::create($data);
        
        //$user->notify(new MessageRecivedNotification($message));

        return back();
    }
}
