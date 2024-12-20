<?php

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
        Schema::create("user", function(Blueprint $table){
            $table->id();
            $table->string("user");
            $table->string('nom');
            $table->string('prenom');
            $table->string("password");
            $table->unsignedBigInteger("role"); 
            $table->string("cin"); 

            $table->rememberToken();
            $table->timestamps();

            $table->unsignedBigInteger("creater")->nullable(); 

            $table->foreign("creater")->references("id")->on("user");
            $table->foreign("role")->references("id")->on("role");
        })  ; 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
