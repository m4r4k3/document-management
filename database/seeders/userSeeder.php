<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User ;
class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
 
       public function run(): void
    {
        User::create([
            
                "user"=>"admin",
                "password"=>bcrypt("admin"),
                "nom_complet"=>"marwane akchar"
            
        ]);
    }
}
