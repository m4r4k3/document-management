<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create("client", function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("nom_client");
            $table->string("modifier_par")->default("aucun");
            $table->string("numero_cin");
            $table->string("creer_par");
            $table->rememberToken();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
