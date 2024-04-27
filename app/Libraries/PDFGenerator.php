<?php
namespace App\Libraries;



use TCPDF;
use App\Libraries\QRCodeGenerator;
use App\Models\Ticket;
use Illuminate\Support\Facades\Storage;
use App\Libraries\Payement;
use App\Models\Post\Tag;

class PDFGenerator
{
    /**
     * Génère un fichier PDF personnalisé contenant un QR code à partir des données fournies.
     *
     * @param string $data Données à encoder dans le QR code
     * @param string $cheminDossierQRCode Chemin du dossier dans le répertoire storage pour le QR code (ex: 'public/qrcodes')
     * @return string|null Nom du fichier PDF généré, null en cas d'erreur
     */
    public static function genererPDFPersonnaliseAvecQRCode($data, Ticket $ticket,Payement $payement,$cheminDossierQRCode='public/qrcodesGPT')
    {
        // Générer un nom de fichier unique pour le QR code
        $nomFichierQRCodeUnique = uniqid() . '.png';

        // Générer l'URL publique du QR code
        $urlQrCode = QRCodeGenerator::genererEtEnregistrerQRCode($data, $nomFichierQRCodeUnique, $cheminDossierQRCode);

        if (!$urlQrCode) {
            return null; // Retourner null en cas d'erreur lors de la génération du QR code
        }

        // Générer un nom de fichier unique pour le PDF
        $nomFichierPDFUnique = uniqid() . '.pdf';

        // Créer une nouvelle instance de TCPDF
        $pdf = new TCPDF(orientation:'L');

        // Ajouter une page
        $pdf->AddPage();

        //self::ajouterImageBackground($pdf,'image/image.jpg');
        self::ajouterEnTete($pdf);
        self::ajouterTexteCorps($pdf,$ticket);
        self::ajouterBlocInformations($pdf, $ticket,$payement);
        self::ajouterQRCode($pdf,$urlQrCode);
        self::ajouterLoremIpsum($pdf);
        self::ajouterPiedDePage($pdf);

        // Rendre le PDF
        $pdfContent = $pdf->Output('S'); // Get the PDF content as string

        // Enregistrer le PDF dans le répertoire storage
        Storage::put("public/pdf/$nomFichierPDFUnique", $pdfContent);

        // Retourner le nom du fichier PDF généré
        return $nomFichierPDFUnique;
    }



    private static function ajouterImageBackground(TCPDF $pdf,string $urlImageBg)
    {
        // Ajouter l'image en arrière-plan avec une opacité de 0,3
        $pdf->Image($urlImageBg, 0, 0, 297, 210, '', '', '', false, 300, '', false, false, 0, 'L', false, false, 0);
    }

    private static function ajouterEnTete(TCPDF $pdf,string $urlLogoTravel='logo/logo.png',string $urlLogoCompagnie='logo/logo.png')
    {
        // Ajouter l'en-tête avec les images à gauche et à droite
        $pdf->Image($urlLogoTravel, 10, 10, 30, '', 'JPG', '', '', false, 300, '', false, false, 0, false, false, false);
        $pdf->Image($urlLogoCompagnie, 250, 10, 30, '', 'JPG', '', '', false, 300, '', false, false, 0, false, false, false);
    }

    private static function ajouterTexteCorps(TCPDF $pdf,Ticket $ticket)
    {
        // Définir la police et la taille pour le texte du corps
        $pdf->SetFont('helvetica', '', 12);

        // Ajouter le texte du corps
        //$pdf->SetXY(0, 30); // Déplacer le curseur à droite

        $title="Ticket N° {$ticket->numero}";

        $pdf->SetFont('helvetica','B',20);
        $w = $pdf->GetStringWidth($title)+6;
        $X = (250 -$w)/2;
        $pdf->setY(30);
        $pdf->SetDrawColor(0,80,180);
        $pdf->SetFillColor(230,230,0);
        $pdf->SetTextColor(220,50,50);
        $pdf->SetLineWidth(1);
        $pdf->SetX($X);
        $pdf->Cell($w+50,15,$title, 0, 1, 'C',true);
        //$pdf->SetX($X);
        //$pdf->SetFont('helvetica','I',10);
       // $pdf->Cell($w+50,3 ,'Société arema et frère', 0, 1, 'C',true);
        $pdf->Ln(10);
        $pdf->SetDrawColor();
        $pdf->SetFillColor();
        $pdf->SetTextColor();
        
    }

    private static function ajouterBlocInformations(TCPDF $pdf,Ticket $ticket,Payement $payement)
    {
        // Ajouter un bloc d'informations à droite
        $pdf->SetXY(40, 55); // Déplacer le curseur à droite
        $pdf->SetFont('helvetica', 'B', 14); // Définir la police en gras pour le titre
        //$pdf->Cell(0, 10, 'Informations du ticket', 0, 1); // Ajouter le titre

        $title='Informations du Ticket';
        $pdf->SetFont('helvetica','B',18);
        $w = $pdf->GetStringWidth($title)+6;
        $pdf->SetX((120-$w)/2);
        $pdf->SetDrawColor(0,80,180);
        $pdf->SetFillColor(230,230,0);
        $pdf->SetTextColor(220,50,50);
        $pdf->SetLineWidth(1);
        $pdf->Cell($w+50,12,$title,1,1,'C',true);
        $pdf->Ln(10);
        $pdf->SetDrawColor();
        $pdf->SetFillColor();
        $pdf->SetTextColor();


        // Définir les informations du ticket
        $informationsTicket = [
            'Nom' => strtoupper($ticket->user->name),
            'Prenom' => $ticket->user->name,
            'Numero' => "+226 {$ticket->user->number}",
            'Compagnie' => $ticket->compagnie()->name,
            'Ville de Depart' => $ticket->depart()->name,
            'Ville de Destination' => $ticket->destination()->name,
            'Heure de Depart' => $ticket->heureDepart(),
            'Prix' => $payement->getPrix().$payement->getMonais(),
            'Statut' => 'Payer',
            'Moyen de Payment' => "Orange Money ({$payement->getNumero()})",
            'Code Transaction' => $payement->getCodeTransfert(),
            // Ajouter d'autres paires de label-valeur si nécessaire
        ];

        // Définir la police normale pour les informations
        $pdf->SetFont('helvetica', '', 12);

        // Parcourir les informations et les ajouter sous forme de "Label : Valeur"
        foreach ($informationsTicket as $label => $valeur) {
            $pdf->SetX(30);
            $pdf->SetFont('helvetica', '', 12);
            $pdf->Cell(0, 7, "$label : ", 0, 0
        );

            $pdf->SetX(80);
            $pdf->SetFont('helvetica', 'B', 12);
            $pdf->Cell(0, 7, " $valeur", 0, 1);
        }
    }

    private static function ajouterQRCode(TCPDF $pdf,string $urlQrCode)
    {
        // Déplacer le curseur pour ajouter le QR code
        $pdf->SetXY(200, 70); // Déplacer le curseur en bas des informations

        // Insérer le QR code
        $pdf->Image($urlQrCode, $pdf->GetX(), $pdf->GetY(), 70, 70, 'PNG');
    }

    private static function ajouterLoremIpsum(TCPDF $pdf)
    {
        // Ajouter les quatre lignes "Lorem Ipsum" avant le pied de page
        $pdf->SetXY(10, 160); // Déplacer le curseur en bas des informations
        $pdf->SetFont('helvetica', 'I', 8);
        for ($i = 0; $i < 4; $i++) {
            $regle= "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Distinctio blanditiis ea porro repellendus sequi. Dolore earum ea quaerat veniam nihil? Praesentium vitae quasi minus modi velit magnam.";

            switch ($i+1) {
                case 1:
                    $regle = "(*) ".$regle;
                    break;
                case 2:
                    $regle = "(**) ".$regle;
                    break;
                case 3:
                    $regle = "(***) ".$regle;
                    break;
                case 4:
                    $regle = "(****) ".$regle;
                    break;
                case 5:
                    $regle = "(*****) ".$regle;
                    break;
                                        

            }
            $pdf->Cell(0, 0, $regle, 0, 1);
        }
    }

    private static function ajouterPiedDePage(TCPDF $pdf)
    {
        // Ajouter le pied de page avec "Bon voyage" centré
        $pdf->SetY(-35); // Déplacer le curseur vers le bas pour ajouter le pied de page
        $pdf->SetFont('helvetica', 'I', 12); // Définir la police normale pour le pied de page
        $pdf->Cell(0, 10, 'Bon voyage', 0, 0, 'C'); // Ajouter "Bon voyage" centré
    }


}

