<?php

namespace App\Models\Voyage;

use App\Models\User;
use App\Models\Voyage\Ligne;
use App\Models\Voyage\Voyage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'heure_depart',
        'heure_arriver',
        'user_id',
        'ligne_id'
    ];

    protected $with = [
        'admin',
        'ligne'
    ];

    function ligne():BelongsTo{
        return $this->belongsTo(Ligne::class);
    }

    function admin():BelongsTo{
        return $this->belongsTo(User::class);
    }

    function voyages():HasMany{
        return $this->hasMany(Voyage::class);
    }
}
