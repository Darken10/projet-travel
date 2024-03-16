<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Ticket;
use Illuminate\Http\Request;
use App\Models\Voyage\Voyage;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Ticket\TicketRequest;
use App\Http\Requests\Ticket\PayerFormRequest;
use App\Models\Ticket\Payer;

class TicketController extends Controller
{
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
        
        if ($isPayer) {
            $pdfName = uniqid("pdf_{$ticket->numero}_") . '.pdf';
            $qrName = uniqid("qr_{$ticket->numero}_") . '.png';
            $data['code'] = $payment->codeTransfert;
            $data['pdfUrl'] = './tickets/pdf/' . $pdfName;
            $data['QRUrl'] = './tickets/qr/' . $qrName;
        }

        $payer = Payer::create($data);
        if($payer){
            
        }
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
}



class Payement
{

    public static  $NUMERO = 12345678;
    public static  $OTP = 123456;
    private int $numero;
    private int $otp;
    public int $prix;

    private string $moyenPayment = "orange";
    public string $codeTransfert;



    function __construct(array $credential)
    {
        ['numero' => $this->numero, 'otp' => $this->otp, 'prix' => $this->prix] = $credential;
        $this->codeTransfert = uniqid('OM');
    }

    function payement(): bool
    {
        return $this->numero == static::$NUMERO && $this->otp == static::$OTP;
    }
}


class QRCodeGenerate {
    
}

class PdfGenerate{

}