<?php

namespace App\Models\Voyage;

use App\Models\Compagnie;
use App\Models\Statut;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Voyage extends Model
{
    use HasFactory;

    protected $fillable = [
        'compagnie_id',
        'course_id',
        'admin_id',
        'statut_id'
    ];

    protected $with = [
        'compagnie',
        'course',
        'admin',
        'statut'
    ];

    function depart(){
        return $this->course->ligne->depart;
    }

    function destination(){
        return $this->course->ligne->destination;
    }

    function heureDepart(){
        return $this->course->heure_depart;
    }
    function heureArriver(){
        return $this->course->heure_arriver;
    }

    function distance(){
        return $this->course->ligne->distance;
    }

    function compagnie():BelongsTo{
        return $this->belongsTo(Compagnie::class);
    }

    function course():BelongsTo{
        return $this->belongsTo(Course::class);
    }

    function admin():BelongsTo{
        return $this->belongsTo(User::class,'admin_id');
    }

    function statut():BelongsTo{
        return $this->belongsTo(Statut::class);
    }

    function tickets():HasMany{
        return $this->hasMany(Ticket::class);
    }
}
