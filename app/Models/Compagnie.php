<?php

namespace App\Models;

use App\Models\User;
use App\Models\Voyage\Voyage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Compagnie extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'sigle',
        'logoUrl',
        'slogant',
        'description',
        'code',
        'patron_id',
        'isActive',
        'statut',
        'note',
    ];

    /*function patron():BelongsTo{
        return $this->belongsTo(User::class,'patron_id');
    }*/

    function admins():HasMany{
        return $this->hasMany(User::class);
    }

    function voyages():HasMany{
        return $this->hasMany(Voyage::class);
    }
}
