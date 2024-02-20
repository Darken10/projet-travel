<?php

use App\Models\Statut;
use App\Models\User;
use App\Models\Voyage\Ligne;
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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Ligne::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->time('heure_depart');
            $table->time('heure_arriver');
            $table->foreignIdFor(User::class)->constrained()->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
