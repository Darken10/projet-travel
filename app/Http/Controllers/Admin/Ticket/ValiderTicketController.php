<?php

namespace App\Http\Controllers\Admin\Ticket;

use Exception;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Ticket;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\Ticket\ModifierStatutsInfo;
use App\Http\Requests\Admin\Ticket\ValidationTicketFormRequest;

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

    function validationForm(){
        return view('ticket.validatationForm');
    }

    //  http://localhost:8000/ticket-validation/5/valider
    function valider(ValidationTicketFormRequest $request,Ticket $ticket)
    {
        //$qr = new QRCodeGenerate($ticket);
        //dd($qr->imagePng());
        //$pdf = new PdfGenerate($ticket,$qr);
        $data = $request->validated();

        $this->_valider($ticket,$data['code']);

        return back()->with('error',"Le Ticket est invalide" );
    }

    function VerifierEtValider(ValidationTicketFormRequest $request){
        $data = $request->validated();
        $client = User::where('number',$data['numero'])->get()->last();
        if($client!=null){
            $ticket = Ticket::where('code',$data['code'])->where('user_id',$client->id)->get()->last();
            if($ticket!=null){
                $this->_valider($ticket,$data['code']);
            }
        }

        return back()->with('error',"Le Ticket est invalide" );
    }

    private function _valider(Ticket $ticket,int $code){
        //dd($ticket->statut_id == 7,$code==$ticket->code ,$ticket,$code);
        if($ticket->statut_id == 7){
            return back()->with('error',"Le Ticket n°{$ticket->numero_tk} est deja valider" );
        } else{
            if($code==$ticket->code ){
            
                try {
                    $ticket->statut_id = 7;
                    $ticket->valider_at = Carbon::now();
                    $ticket->admin_id = Auth::user()->id;
                    $ticket->save();
                } catch (Exception $e) {
                    throw $e;
                }
                return back()->with('success',"Le Ticket n°{$ticket->numero_tk} a bien ete valider" );
            }
        }
       
    }
}
