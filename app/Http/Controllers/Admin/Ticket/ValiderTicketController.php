<?php

namespace App\Http\Controllers\Admin\Ticket;

use App\Models\Ticket;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Ticket\ValidationTicketFormRequest;
use App\Models\Admin\Ticket\ModifierStatutsInfo;

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

    function suspendre(Request $request, Ticket $ticket)
    {
        $statutFinale = 10;
        //verifier si deja suspendu
        if ($ticket->statut_id == 10) {
            return back()->with('info', "Le ticket N°{$ticket->numero} est déja suspendu");
        }

        // loger les modifications
        $data['user_id'] = $request->user()->id;
        $data['ticket_id'] = $ticket->id;
        $data['statut_initiale_id'] = $ticket->statut_id;
        $data['statut_finale_id'] = $statutFinale;

        $modification = ModifierStatutsInfo::create($data);
        // Changer la statut du ticket du ticket
        $payer = $ticket->payers->last();
        $ticket->statut_id = $statutFinale;

        if(($payer->statut_id == 5 || $payer->statut_id == 11 || $payer->statut_id == 1)){
            if ($ticket->save() && isset($modification->id)) {
                return back()->with('success', "Le Ticket N°{$ticket->numero} a été suspendu avec success");
            }
            else{
                return back()->with('error', "Une erreur est survenu lors de la suspention du ticket N°{$ticket->numero}");
            }
        }
        else{
            return back()->with('error', "Le ticket N°{$ticket->numero} ne peut  pas etre suspendu");
        }

        return back()->with('error', "Une erreur inconnue est survenue");
    }
}
