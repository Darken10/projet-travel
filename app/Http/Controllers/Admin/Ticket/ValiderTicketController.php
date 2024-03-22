<?php

namespace App\Http\Controllers\Admin\Ticket;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Ticket\ValidationTicketFormRequest;
use App\Models\Ticket;
use App\Models\Ticket\Payer;
use Illuminate\Http\Request;

class ValiderTicketController extends Controller
{
    function verifier(ValidationTicketFormRequest $resquet, Ticket $ticket)
    {
        $payer = $ticket->payers->last();
        if ($ticket->statut_id == 5 && $payer->statut_id == 5) {
            if ($ticket->user->number == $resquet->input('numero') && $payer->ticket_code == $resquet->input('code')) {
                $payer->statut_id = 12;
                $ticket->statut_id = 12;
                $ticket->save();
                $payer->save();
                return back()->with('success', 'Le Ticket est Valider Avec Success');
            } else {
                return back()->with('error', 'Le Numero et/ou le Code est incorrect');
            }
        } else {
            return back()->with('error', 'Ce ticket ne peut pas être valider car il n\'est pas payers');
        }
    }
}
