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
        Client::create([
            "n_client"=>"0100",
            "nom_client"=>"marwane akchar"
        ]);
    }  
}
