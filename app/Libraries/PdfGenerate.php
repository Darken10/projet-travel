<?php

namespace App\Libraries;

use App\Models\Ticket;
use FPDF;
use Illuminate\Support\Facades\Storage;

require app_path("Libraries/fpdf/fpdf.php");

class PdfGenerate extends FPDF
{
    function __construct(
        private Ticket $ticket,
        private QRCodeGenerate $qr
    )
    {
        $this->main();
        parent::__construct('L');
        
    }


function Header()
{

    // Logo
    $this->Image(Storage::path("tickets/qrcodes/qrcode_Tk24-1-3_660fce421d4a2.png"),10,6,30);
    $this->Image('logo.png',$this->GetPageWidth()-(30+10),6,30);
    $this->SetY(35);
    //$this->AddPage();
}


function Footer()
{
    // Pied de page
    $this->SetY(-15);
    $this->SetFont('Arial','I',8);
    $this->SetTextColor(128);
    $this->Cell(0,10,'Page '.$this->PageNo(),0,0,'C');
}

function main(){
    $this->Header();
    $this->Footer();
}

    

}
