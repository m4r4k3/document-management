<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected  $table = "client";
protected $fillable= ["n_client", "nom_client",  "numero_cin" ,"creer_par", "modifier_par"];
}
