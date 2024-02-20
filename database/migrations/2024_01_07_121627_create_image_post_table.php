<?php

use App\Models\Post;
use App\Models\Post\Image;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('image_post', function (Blueprint $table) {
            $table->foreignIdFor(Image::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(Post::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->primary(['image_id','post_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('image_post');
    }
};
