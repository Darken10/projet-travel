<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function showProfile(Request $request){

        return view('user.show-profile',[
            'user'=> $request->user(),
        ]);
    }
}
