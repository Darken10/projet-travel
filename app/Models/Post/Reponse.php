<?php

namespace App\Models\Post;

use App\Models\User;
use App\Models\Post\LikeReponse;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reponse extends Model
{
    use HasFactory;

    protected $fillable = [
        'reponse',
        'user_id',
        'comment_id',
        'is_admin',
    ];

    protected $with = [
        'user',
    ];

    function comment():BelongsTo{
        return $this->belongsTo(Comment::class);
    }

    function user():BelongsTo{
        return $this->belongsTo(User::class);
    }

    function likeReponses():HasMany{
        return $this->hasMany(LikeReponse::class);
    }

    function countLike(): int{
        return count($this->likeReponses);
    }

    function isLike(User $user){

        return LikeReponse::where('user_id',$user->id)->Where('reponse_id',$this->id)->get()->isNotEmpty();
         
    }

}
