<?php

namespace App\Models\Root;

use App\Models\Root\Pays;
use App\Models\Root\Province;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Region extends Model
{
    use HasFactory;

    protected $with = [
        'pays'
    ];

    protected $fillable = [
        'name',
        'pays_id'
    ];


    function pays():BelongsTo{
        return $this->belongsTo(Pays::class);
    }

    function provinces():HasMany{
        return $this->hasMany(Province::class);
    }
}


