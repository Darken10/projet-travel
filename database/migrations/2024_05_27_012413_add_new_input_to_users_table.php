<?php

use App\Models\Statut;
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
        Schema::table('users', function (Blueprint $table) {
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('type_document')->default('CNIB');
            $table->string('cnib_recto_url')->nullable();
            $table->string('cnib_verso_url')->nullable();
            $table->foreignIdFor(Statut::class)->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('cnib_recto_url');
            $table->dropColumn('cnib_verso_url');
            $table->dropColumn('type_document');
            $table->dropColumn('first_name');
            $table->dropColumn('last_name');
            $table->dropColumn('statut_id');
        });
    }
};
