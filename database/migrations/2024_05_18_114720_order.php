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
        $table->softDeletes();

        $table->unsignedBigInteger("client_id");
        $table->unsignedBigInteger("modifier_par")->nullable();
        $table->unsignedBigInteger("creer_par");

        $table->unsignedBigInteger("cin")->nullable();
        $table->unsignedBigInteger("attestation")->nullable();
        $table->unsignedBigInteger("CG")->nullable();
        $table->unsignedBigInteger("PC")->nullable();
        $table->unsignedBigInteger("contrat")->nullable();
        
        $table->foreign("cin")->references("id")->on("image");
        $table->foreign("attestation")->references("id")->on("image");
        $table->foreign("CG")->references("id")->on("image");
        $table->foreign("PC")->references("id")->on("image");
        $table->foreign("contrat")->references("id")->on("image");

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
