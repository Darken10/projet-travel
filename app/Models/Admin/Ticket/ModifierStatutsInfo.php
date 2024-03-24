<?php

namespace App\Models\Admin\Ticket;

use App\Models\Statut;
use App\Models\Ticket;
use App\Models\Ticket\Payer;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class ModifierStatutsInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'ticket_id',
        'payer_id',
        'admin_id',
        'statut_initiale_id',
        'statut_finale_id',
    ];

    function user():BelongsTo{
        return $this->belongsTo(User::class,'user_id'); 
    }


    function ticket():BelongsTo{
        return $this->belongsTo(Ticket::class); 
    }

    function payer():BelongsTo{
        return $this->belongsTo(Payer::class); 
    }

    function statutInitiale():BelongsTo{
        return $this->belongsTo(Statut::class,'statut_initiale_id'); 
    }

    function statutFinale():BelongsTo{
        return $this->belongsTo(Statut::class,'statut_finale_id'); 
    }
}
