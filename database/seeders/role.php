<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class role extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Role::insert([
            ["role"=>"admin"] ,
            ["role"=>"operateur"] ,
        ]) ;
    }
    
}
