<?php

namespace App\Libraries;

require app_path("Libraries/QRCode/qrlib.php");

use App\Models\Ticket;
use Illuminate\Support\Facades\Storage;
use QRcode;

class QRCodeGenerator
{


    /**
     * Génère un QR code à partir des données fournies, enregistre le QR code dans le répertoire storage
     * et retourne l'URL publique du QR code.
     *
     * @param string $data Données à encoder dans le QR code
     * @param string $nomFichier Nom du fichier pour le QR code (ex: 'qrcode.png')
     * @param string $cheminDossier Chemin du dossier dans le répertoire storage (ex: 'public/qrcodes')
     * @return string|null URL publique du QR code généré, null en cas d'erreur
     */
    public static function genererEtEnregistrerQRCode($data, $nomFichier, $cheminDossier)
    {
        // Chemin complet du fichier dans le répertoire storage
        $cheminComplet = storage_path("app/$cheminDossier/$nomFichier");

        // Créer le QR code et le sauvegarder dans une variable temporaire
        ob_start();
        QRcode::png($data, null, 'H', 10);
        $qrCodeContent = ob_get_clean();

        // Déplacer le contenu du QR code vers le répertoire storage
        if (Storage::put("$cheminDossier/$nomFichier", $qrCodeContent)) {
            // URL publique du fichier QR code
            $url = ltrim(Storage::url("$cheminDossier/$nomFichier"),'/');
            return [$url,$cheminComplet];
        }

        return null; // Retourner null en cas d'erreur
    }
}