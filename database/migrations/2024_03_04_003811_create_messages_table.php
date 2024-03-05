<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            //$table->foreignIdFor(User::class,'from_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            //$table->foreignIdFor(User::class,'to_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            
            $table->integer('from_id',unsigned:true)->unsigned();
            $table->foreign('from_id','from')->references('id')->on('users')->cascadeOnDelete();
            $table->integer('to_id',unsigned:true)->unsigned();
            $table->foreign('to_id','to')->references('id')->on('users')->cascadeOnDelete();
            $table->text('message');
            $table->dateTime('read_at')->nullable();
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
