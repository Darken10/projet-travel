<?php

namespace App\Models\Post;

use App\Models\User;
use App\Models\Post\Reponse;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LikeReponse extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'reponse_id',
    ];


    function user():BelongsTo{
        return $this->belongsTo(User::class);
    }

    function reponse():BelongsTo{
        return $this->belongsTo(Reponse::class);
    }
}
