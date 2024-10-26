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
            
            $table->string('nom');
            $table->string('prenom');
            $table->string("cin");

            $table->unsignedBigInteger("modifier_par")->nullable();
            $table->unsignedBigInteger("creer_par");

            $table->rememberToken();

            $table->foreign("modifier_par")->references("id")->on("user") ;
            $table->foreign("creer_par")->references("id")->on("user") ;
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
