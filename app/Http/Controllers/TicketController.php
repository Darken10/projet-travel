<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Libraries\Payement;
use App\Models\Ticket\Payer;
use App\Libraries\PDFGenerator;
use App\Libraries\QRCodeGenerate;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Ticket\TicketRequest;
use App\Http\Requests\Ticket\PayerFormRequest;

class TicketController extends Controller{
    function acheter(TicketRequest $request, Ticket $ticket)
    {

        return to_route('ticket.payerForm', $ticket);
    }

    function payerForm(Ticket $ticket)
    {

        return view('ticket.acheter', [
            'ticket' => $ticket,
            'user' => Auth::user(),
        ]);
    }

    function payer(PayerFormRequest $request, Ticket $ticket)
    {

        $data = $request->validated();
        $data['prix'] = $ticket->prix();
        $data['user_id'] = $ticket->user->id;
        $data['statut_id'] = 5;
        $data['ticket_id'] = $ticket->id;

        $payment = new Payement($data);
        $isPayer = $payment->payement();
        //dd($isPayer);
        if ($isPayer) {
            //$qr = new QRCodeGenerate($ticket);
            $qr = new PDFGenerator();
            dd($qr->genererPDFPersonnaliseAvecQRCode('http://localhost:8000/ticket-validation/5/valider',$ticket,$payment));
            /*if ($qr->imagePng()){
                $qrName = $qr->geteFilePath();
                $pdfName = uniqid("pdf_{$ticket->numero}_") . '.pdf';
                $data['code'] = $payment->codeTransfert;
                $data['pdfUrl'] = './tickets/pdf/' . $pdfName;
                $data['QRUrl'] =  $qrName;
                dd($data);
            }*/
        } else {
            return back()->with('error', 'votre payment a echouer veuiller le ressayez svp ');
        }

        $payer = Payer::create($data);
        if (!$payer) {
            return back()->with('error', "Une erreur inconnu arriver lors du payment. contacter un administrateur de Travel pour quil regle ce probleme");
        } else {
            $ticket->statut_id = 5;
            $ticket->save();
            return to_route('ticket.payer_show', [
                'payer' => $payer,
            ]);
        }
        return back()->with('error', "Une erreur inconnu est survenue");
    }


    function mesTickets()
    {

        $tk = Auth::user()->tickets;
        return view('ticket.mes-tickets', [
            'tickets' => $tk
        ]);
    }

    function show(Ticket $ticket)
    {

        return view('ticket.show', [
            'ticket' => $ticket
        ]);
    }


    function payer_show(Payer $payer)
    {
        return view('ticket.payer_show', [
            'payer' => $payer,
        ]);
    }


}
