<?php

namespace App\Models\Post;

use App\Models\User;
use App\Models\Post\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LikeComment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'comment_id',
    ];


    public function user():BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function comment():BelongsTo{
        return $this->belongsTo(Comment::class);
    }

    


}
