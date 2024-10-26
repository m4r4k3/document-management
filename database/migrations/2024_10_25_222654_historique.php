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
        Schema::create("historique", function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('order');
            $table->unsignedBigInteger('by');
            $table->string("from")->nullable();
            $table->string("to");
            $table->string("case");

            $table->rememberToken();
            
            $table->foreign("order")->references("id")->on("order") ;
            $table->foreign("by")->references("id")->on("user") ;
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
