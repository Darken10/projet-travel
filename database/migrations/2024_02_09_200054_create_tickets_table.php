<?php

use Carbon\Carbon;
use App\Models\User;
use App\Models\Statut;
use App\Models\Voyage\Voyage;
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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(Voyage::class);
            $table->integer('numero_chaise',unsigned:true);
            $table->string('numero_tk');
            $table->integer('code',unsigned:true);
            $table->date('date');
            $table->string('prix',10)->nullable();
            $table->string('moyen_payement')->nullable();
            $table->string('numero',30)->nullable();
            $table->string('otp',10)->nullable();
            $table->string('pdfUrl')->unique()->nullable();
            $table->string('QRUrl')->unique()->nullable();
            $table->boolean('a_bagage')->default(false);
            $table->foreignIdFor(Statut::class)->default(6);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
