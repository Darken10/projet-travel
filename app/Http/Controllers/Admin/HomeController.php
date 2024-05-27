<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Ticket;
use App\Models\Compagnie;
use Illuminate\Http\Request;
use App\Models\Voyage\Voyage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    function dashbord(){

        $user_Compagnie = Auth::user()->compagnie;
        $voyages = Voyage::query()->where('compagnie_id',$user_Compagnie->id)->get();
        $a = [];

        foreach($voyages as $voyage){
            $a[$voyage->id] = Ticket::query()
                                    ->where('voyage_id',$voyage->id)
                                    ->where('statut_id','5')
                                    ->where('date',Carbon::today()->format('Y-m-d'))
                                    ->get() ; 
                                    
        }
       // dd($a);
        return view('admin.dashbord',[
            'tickets'=> $a,
        ]);
    }
}
