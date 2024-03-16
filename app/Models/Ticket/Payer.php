<?php

namespace App\Models\Ticket;

use App\Models\Statut;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'statut_id',
        'ticket_id',
        'numero',
        'otp',
        'pdfUrl',
        'QRUrl',
        'prix',
        'code'
    ];

    protected $with = [
        'user',
        'status',
        'ticket'
    ];


    function user():BelongsTo{
        return $this->belongsTo(User::class);
    }

    function statut():BelongsTo{
        return $this->belongsTo(Statut::class);
    }

    function ticket():BelongsTo{
        return $this->belongsTo(Ticket::class);
    }
}
