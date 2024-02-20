<?php

namespace App\Models\Root;

use App\Models\Root\Region;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pays extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'numero_identifiant'
    ];

    function regions():HasMany{
        return $this->hasMany(Region::class);
    }
}
