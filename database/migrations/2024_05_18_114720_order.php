<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up( ): void
    {
    Schema::create("order", function (Blueprint $table){
        $table->id();
        $table->timestamps();

        $table->unsignedBigInteger("client_id");
        $table->unsignedBigInteger("modifier_par")->nullable();
        $table->unsignedBigInteger("creer_par");

        $table->string("cin")->nullable();
        $table->string("attestation")->nullable();
        $table->string("CG")->nullable();
        $table->string("PC")->nullable();
        $table->string("contrat")->nullable();

        $table->foreign("modifier_par")->references("id")->on("user") ;
        $table->foreign("creer_par")->references("id")->on("user") ;
        $table->foreign("client_id")->references("id")->on("client");
    }) ;

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
