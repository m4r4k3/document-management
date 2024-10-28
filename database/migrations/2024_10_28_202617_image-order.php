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
        Schema::create("imageOrder" , function (Blueprint $table){
            $table->id() ;
            $table->unsignedBigInteger("order_id") ;
            $table->unsignedBigInteger("image_id") ;

            $table->foreign("image_id")->references("id")->on("image");
            $table->foreign("order_id")->references("id")->on("order");
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
