<?php

namespace App\Models;

use App\Models\User;
use App\Models\Root\Ville;
use App\Models\Ticket\Payer;
use App\Models\AutrePersonne;
use App\Models\Voyage\Voyage;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Ticket\ModifierStatutsInfo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'voyage_id',
        'numero',
        'code',
        'date',
        'statut_id',
        'numero_chaise',
        'numero_tk',
        'prix',
        'moyen_payement',
        'otp',
        'pdfUrl',
        'QRUrl',
        'a_bagage',
        'valider_at',
    ];

    protected $with = [
        'voyage',
        'user',
        'statut',
    ];

    function voyage():BelongsTo{
        return $this->belongsTo(Voyage::class);
    }

    function user():BelongsTo{
        return $this->belongsTo(User::class);
    }

    function statut():BelongsTo{
        return $this->belongsTo(Statut::class);
    }

    function statutName():string{
        return $this?->statut->name;
    }

    function heureDepart(){
        return $this?->voyage->heureDepart();
    }

    function heureArriver(){
        return $this?->voyage->heureArriver();
    }


    function depart():Ville|null{
        return $this->voyage?->depart();
    }

    function destination():Ville|null{
        return $this->voyage?->destination();
    }

    function distance():int{
        return $this->voyage?->course?->ligne?->distance ?? 0;
    }

    function prix():int{
        return $this->voyage->prix ?? 0;
    }

    function compagnie():Compagnie{
        return $this->voyage?->compagnie;
    }

    function payers():HasMany{
        return $this->hasMany(Payer::class);
    }

    function modifierStatutsInfos():HasMany{
        return $this->hasMany(ModifierStatutsInfo::class);
    }

    function autrePersonne():null | BelongsTo{
        return $this->belongsTo(AutrePersonne::class);
    }
}
