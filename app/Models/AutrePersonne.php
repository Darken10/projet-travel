<?php

namespace App\Models;

use App\Models\Ticket;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AutrePersonne extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'prenom',
        'date_naissance',
        'numero_tel',
        'email',
        'numero_piece',
        'date_expiration',
        'url_cnib_face',
        'url_cnib_dos',
        'created_at',
        'updated_at',
    ];

    function ticket():HasMany{
        return $this->hasMany(Ticket::class);
    }
}
