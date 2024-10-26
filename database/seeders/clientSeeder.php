<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Client;
class clientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   public function run(): void
    {
        Client::create( [
            'nom' => 'Doe',
            'prenom' => 'John',
            'cin' => 'A12345678',
            'creer_par' => 1, 
        ]);
        Client::create( [
            'nom' => 'Smith',
            'prenom' => 'Jane',
            'cin' => 'B98765432',
            'creer_par' =>1,   
        ]);
    }  
}
