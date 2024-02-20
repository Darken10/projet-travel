<?php

namespace App\Models\Root;

use App\Models\Root\Ville;
use App\Models\Root\Region;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Province extends Model
{
    use HasFactory;

    protected $with = [
        'region',
    ];

    protected $fillable = [
        'name',
        'region_id'
    ];


    function region():BelongsTo{
        return $this->belongsTo(Region::class);
    }

    function villes():HasMany{
        return $this->hasMany(Ville::class);
    }
}
