<?php

namespace App\Models\Post;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'url',
    ];

    public function posts() :BelongsToMany{
        return $this->belongsToMany(Post::class);
    } 
}
