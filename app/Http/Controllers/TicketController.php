<?php

namespace App\Http\Controllers;

use DateTime;
use Carbon\Carbon;
use App\Models\Ticket;
use App\Libraries\Payement;
use App\Models\Ticket\Payer;
use App\Models\Voyage\Voyage;
use App\Libraries\PDFGenerator;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Ticket\TicketRequest;
use App\Http\Requests\Ticket\PayerFormRequest;
use Exception;

class TicketController extends Controller{

    /*function acheter(, Ticket $ticket)
    {
        return to_route('ticket.payerForm', $ticket);
    }
*/
    function payerForm(TicketRequest $request,Voyage $voyage)
    {
        $data = $request->validated();
        //$dateVoyage = new Carbon($data['date']);
        [$nbPlaceDisponible,$numeroPlace] = $this->_numeroChaise($voyage,$data['date']);
        
        if( $nbPlaceDisponible <= 0){
            return to_route('voyage.index')->with('error',"Desoler, il n'y ya plus de place disponible pour cet voyage");
        }
        $data['user_id'] = Auth::user()->id;
        $data['voyage_id']= $voyage->id;
        $data['numero_chaise'] = $numeroPlace;
        $data['numero_tk'] = $this->_generateNumeroTk($voyage);
        $data['code'] = $this->_completerASixZero(rand(1,999999));
        $data['statut_id'] = 6;

        if(key_exists('a_bagage',$data)){
            $data['a_bagage'] = true;
        }
        $ticket = Ticket::query()
                    ->where('date',$data['date'])
                    ->where('user_id',$data['user_id'])
                    ->where('voyage_id',$data['voyage_id'])
                    ->where('statut_id',6)
                    ->get()
                    ->last();
        if($ticket==null){
            $ticket = Ticket::create($data);
        }

        return view('ticket.acheter', [
            'ticket' => $ticket,
        ]);
    }

    function payer(PayerFormRequest $request, Ticket $ticket)
    {

        $data = $request->validated();
        $data['prix'] = $ticket->prix();


        $payment = new Payement($data);
        $isPayer = $payment->payement();
        //dd($isPayer);
        if ($isPayer) {
            //$qr = new QRCodeGenerate($ticket);
            $data['code_transfert']=$payment->codeTransfert;
            $data['prix']= $payment->getPrix();
            $data['moyen_payement']= $payment->getMoyenPayement();
            $data['monais'] = $payment->getMonais();
            $pdf = new PDFGenerator();
            [$nomPdf,$nomQRCode,$urlPdf,$urlQRCode,$pathPdf,$pathQRCode] = $pdf->genererPDFPersonnaliseAvecQRCode(route('admin.ticket-validation.verification',$ticket),$ticket,$payment);
            
            if (file_exists($pathQRCode) and file_exists($pathPdf)){
                $data['pdfUrl'] = $urlPdf;
                $data['QRUrl'] =  $urlQRCode;

            }
        } else {
            return back()->with('error', 'votre payment a echouer veuiller le ressayez svp ');
        }
        
        
        try {
            $ticket->numero = $data['numero'];
            $ticket->otp = $data['otp'];
            $ticket->prix = $data['prix'];
            $ticket->code_transfert = $data['code_transfert'];
            $ticket->moyen_payement = $data['moyen_payement'];
            $ticket->pdfUrl = $data['pdfUrl'];
            $ticket->QRUrl = $data['QRUrl'];
            $ticket->monais = $data['monais'];
            $ticket->statut_id = 5;
            $ticket->save();
        } catch (Exception $e) {
            throw $e;
        }
        //$ticket = $ticket->updated($data);
        if ($ticket->statut_id != 5) {
            return back()->with('error', "Une erreur inconnu arriver lors du payment. contacter un administrateur de Travel pour quil regle ce probleme");
        } else {
            return to_route('ticket.payer_show', [
                'ticket' => $ticket,
            ])->with('success',"Votre Ticket a bient ete acheter");
        }
        return back()->with('error', "Une erreur inconnu est survenue");
    }


    function mesTickets()
    {

        $tk = Auth::user()->tickets;
        dd($tk->last()->payers);
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


    function payer_show(Ticket $ticket)
    {
        return view('ticket.payer_show', [
            'ticket' => $ticket,
        ]);
    }


    private function _numeroChaise(Voyage $voyage,$date):array{
        $listTk = Ticket::where("voyage_id",$voyage->id)->where('date',$date)->get();
        return [$voyage->nombre_place - count($listTk), $listTk->last() ?? 1];
    } 

    private function _completerParZero(int $a=0):string{
        if($a>=0 && $a<=9){
            return '000'.$a;
        }
        else if($a>=10 && $a<=99){
            return '00'.$a;
        }
        else if($a>=100 && $a<=999){
            return '0'.$a;
        }
        else{
            return $a;
        }
    }

    private function _completerASixZero(int $a):string{
        if($a>=0 && $a<=9){
            return '00000'.$a;
        }
        else if($a>=10 && $a<=99){
            return '0000'.$a;
        }
        else if($a>=100 && $a<=999){
            return '000'.$a;
        }
        else if($a>=1000 && $a<=9999){
            return '00'.$a;
        }
        else if($a>=10000 && $a<=99999){
            return '0'.$a;
        }
        else{
            return $a;
        }
    }

    private function _generateNumeroTk(Voyage $voyage){
        /** @var Array $a le tableau des 'id' de la liste des voyage de la compagnie */
        $a = Voyage::query()->where('compagnie_id',$voyage->compagnie_id)->get()->pluck('id');
        /** @var Array $n le tableau de tout les ticket voyage de la compagnie */
        $n = Ticket::query()->whereIn('voyage_id',$a)->get() ?? 1;
        $annee = new DateTime();
        
        $numeroTk = 'Tk'.$annee->format('y').'-'.$this->_completerParZero($voyage->compagnie_id).'-'.$this->_completerParZero(count($n)+1);

        return $numeroTk;
    }


}
