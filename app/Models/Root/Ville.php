<?php

namespace App\Models\Root;

use App\Models\Root\Province;
use App\Models\Voyage\Ligne;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ville extends Model
{
    use HasFactory;

    protected $with = [
        'province',
    ];
    
    protected $fillable = [
        'name',
        'province_id'
    ];


    function province():BelongsTo{
        return $this->belongsTo(Province::class);
    }

    function departs():HasMany{
        return $this->hasMany(Ligne::class,'depart_id');
    }

    function destinations():HasMany{
        return $this->hasMany(Ligne::class,'destination_id');
    }

    function pays(){
        return $this->province->region->pays();
    }
}
