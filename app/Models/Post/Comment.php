<?php

namespace App\Models\Post;

use App\Models\Post;
use App\Models\User;
use App\Models\Post\Reponse;
use App\Models\Post\LikeComment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'comment',
        'user_id',
        'post_id',
    ];

    protected $with = [
        'user',
        'reponses'
    ];

    function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }


    function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    function reponses(): HasMany
    {
        return $this->hasMany(Reponse::class);
    }

    function likeComments(): HasMany{
        return $this->hasMany(LikeComment::class);
    }

    function countLike() :int{
        return count($this->likeComments);
    }

    public function isLike(User $user){
        return LikeComment::where('user_id',$user->id)->Where('comment_id',$this->id)->get()->isNotEmpty();
    }
}
