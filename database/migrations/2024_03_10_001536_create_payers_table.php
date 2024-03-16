<?php

use App\Models\Statut;
use App\Models\Ticket;
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
        Schema::create('payers', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained();
            $table->foreignIdFor(Ticket::class)->constrained();
            $table->string('prix',10);
            $table->string('code')->unique();
            $table->string('numero',30);
            $table->string('otp',10);
            $table->string('pdfUrl')->unique();
            $table->string('QRUrl')->unique();
            $table->foreignIdFor(Statut::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payers');
    }
};
