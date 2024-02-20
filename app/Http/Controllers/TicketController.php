<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use App\Models\Voyage\Voyage;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Ticket\TicketRequest;

class TicketController extends Controller
{
    function acheter(TicketRequest $request,Ticket $ticket){

        return view('ticket.acheter',[
            'ticket'=> $ticket,
            'user'=>$request->user(),
        ]);
    }

    function mesTickets(){

        $tk = Auth::user()->tickets;
        return view('ticket.mes-tickets',[
            'tickets' => $tk
        ]);
    }

    function show(Ticket $ticket){

        return view('ticket.show',[
            'ticket' => $ticket
        ]);
    }
}
