<?php

namespace App\Http\Controllers\Admin;

use App\Models\Ticket;
use App\Models\Compagnie;
use Illuminate\Http\Request;
use App\Models\Voyage\Voyage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    function dashbord(){

        $tickets = [];
        $user_Compagnie = Auth::user()->compagnie;
        $voyages = Voyage::query()->where('compagnie_id',$user_Compagnie->id)->get();
        $a = [];

        foreach($voyages as $voyage){
            $b= $voyage->id;
            $a[$voyage->id] = Ticket::where('voyage_id',$b)->get() ; 
        }
       // dd($a);
        return view('admin.dashbord',[
            'tickets'=> $a,
        ]);
    }
}
