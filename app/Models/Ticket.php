<?php

namespace App\Models;

use App\Models\User;
use App\Models\Voyage\Voyage;
use Illuminate\Database\Eloquent\Model;
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
        'statut_id',
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

    function heureDepart(){
        return $this->voyage->heureDepart();
    }

    function heureArriver(){
        return $this->voyage->heureArriver();
    }


    function depart(){
        return $this->voyage->depart();
    }

    function destination(){
        return $this->voyage->destination();
    }

    function distance(){
        return $this->voyage->course->ligne->distance ?? '0';
    }

    function prix(){
        return $this->voyage->prix ?? '0';
    }

    function compagnie(){
        return $this->voyage->compagnie;
    }
}
