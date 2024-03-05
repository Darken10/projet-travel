<?php

use App\Models\Root\Ville;
use App\Models\Statut;
use App\Models\Voyage\Chemin;
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
        Schema::create('chemins', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Ville::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(Chemin::class,'chemin_precedent')->nullable()->constrained()->nullOnDelete();
            $table->foreignIdFor(Chemin::class,'chemin_suivant')->nullable()->constrained()->nullOnDelete();
            $table->foreignIdFor(Statut::class);            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chemins');
    }
};
