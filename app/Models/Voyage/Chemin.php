<?php

namespace App\Models\Voyage;

use App\Models\Root\Ville;
use App\Models\Statut;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Chemin extends Model
{
    use HasFactory;

    protected $fillable = [
        'chemin_precedent',
        'chemin_suivant',
        'statut_id',
        'ville_id',
    ];

    protected $with = [
        'ville',
        'statut',
        'suivant',

    ];

    function precedent():BelongsTo{
        return $this->belongsTo(Chemin::class,'chemin_precedent');
    }

    function suivant():BelongsTo{
        return $this->belongsTo(Chemin::class,'chemin_suivant');
    }

    function ville():BelongsTo{
        return $this->belongsTo(Ville::class);
    }

    function statut():BelongsTo{
        return $this->belongsTo(Statut::class);
    }
}
