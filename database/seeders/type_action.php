<?php

namespace Database\Seeders;

use App\Models\TypeAction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class type_action extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TypeAction ::insert([
            ["action"=>"creation"] ,
            ["action"=>"modification"] ,
            ["action"=>"supprimer"] ,
        ]) ;
   }
}
