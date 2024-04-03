<?php

namespace App\Models\Voyage;

use App\Models\User;
use App\Models\Root\Ville;
use App\Models\Voyage\Course;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ligne extends Model
{
    use HasFactory;

    protected $fillable = [
        'depart_id',
        'destination_id',
        'user_id',
        'distance',
    ];

    protected $with = [
        'depart',
        'destination',
        'user',
    ];

    function depart():BelongsTo{
        return $this->belongsTo(Ville::class,'depart_id');
    }

    function destination():BelongsTo{
        return $this->belongsTo(Ville::class,'destination_id');
    }

    function user():BelongsTo{
        return $this->belongsTo(User::class);
    }

    function courses():HasMany{
        return $this->hasMany(Course::class);
    }

    function departName():string{
        return $this->depart?->name;
    }
    function destinationName():string{
        return $this->destination?->name;
    }



}
