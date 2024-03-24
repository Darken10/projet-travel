<?php

use App\Models\Statut;
use App\Models\User;
use App\Models\Ticket;
use App\Models\Ticket\Payer;
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
        Schema::create('modifier_statuts_infos', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Ticket::class)->nullable()->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Payer::class)->nullable()->constrained()->cascadeOnDelete();
            $table->foreignIdFor(User::class,'user_id')->nullable()->constrained()->cascadeOnDelete();
            //$table->foreignIdFor(User::class,'id_admin')->nullable()->constrained()->cascadeOnDelete();
            //$table->foreignIdFor(Statut::class,'id_statut_initiale')->nullable()->constrained()->cascadeOnDelete();
            //$table->foreignIdFor(Statut::class,'id_statut_finale')->nullable()->constrained()->cascadeOnDelete();
            
            $table->integer('statut_initiale_id',unsigned:true)->unsigned();
            $table->foreign('statut_initiale_id','statut_initiale')->references('id')->on('statuts')->cascadeOnDelete();
            $table->integer('statut_finale_id',unsigned:true)->unsigned();
            $table->foreign('statut_finale_id','statut_finale')->references('id')->on('statuts')->cascadeOnDelete();

            $table->boolean('root_vote')->default(false);
            $table->boolean('boss_vote')->default(false);
            $table->boolean('admin_vote')->default(false);
            $table->boolean('user_vote')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modifier_statuts_infos');
    }
};
