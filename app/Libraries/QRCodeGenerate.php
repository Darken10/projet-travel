<?php
namespace App\Libraries;

require app_path("Libraries/QRCode/qrlib.php");
 
use App\Models\Ticket;
use Illuminate\Support\Facades\Storage;
use QRcode;

class QRCodeGenerate {
    private string $path = "tickets/qrcodes/";
    private string $data = '';
    private string $fileName='';
    private int $size = 10;
    private string $level ="H";
    private string $cheminPublic;
    private string $cheminComplet;
    private string $storagePath;


    function __construct(private Ticket $ticket){
        $this->data = route('admin.ticket-validation.valider',$this->ticket);
        $this->fileName = uniqid("qrcode_{$ticket->numero}_").'.png';
        $this->path .= $this->fileName;
        $this->cheminPublic = "{$this->path}";
        $this->cheminComplet = storage_path($this->cheminPublic);

    }

    function imagePng(){
        QRcode::png($this->data,$this->cheminComplet,$this->level,$this->size);
        Storage::put($this->cheminPublic,file_get_contents($this->cheminComplet));
        if(file_exists($this->cheminComplet)){
            $this->storagePath = Storage::url($this->cheminPublic);
            return  true;
        }
        return false;
    }


    function imageSvg(){

    }

    function geteFilePath():string{
        return $this->storagePath;
    }
}
