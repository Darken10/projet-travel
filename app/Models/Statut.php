<?php

namespace App\Models;

use App\Models\Voyage\Voyage;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Ticket\ModifierStatutsInfo;
use App\Models\Voyage\Course;
use App\Models\Voyage\Ligne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Statut extends Model
{
    use HasFactory;

    function voyages():HasMany{
        return $this->hasMany(Voyage::class);
    }

    function ticket():HasMany{
        return $this->hasMany(Ticket::class);
    }

    function lignes():HasMany{
        return $this->hasMany(Ligne::class);
    }

    function courses():HasMany{
        return $this->hasMany(Course::class);
    }



    function statutInitialeModifierStatutsInfos():HasMany{
        return $this->hasMany(ModifierStatutsInfo::class,'statut_initiale_id');
    }

    function statutFinaleModifierStatutsInfos():HasMany{
        return $this->hasMany(ModifierStatutsInfo::class,'statut_finale_id');
    }
}
