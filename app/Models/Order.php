<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public $table = "order";
    public $fillable =["client" ,"modifier_par","creer_par","cin","attestation","CG","PC","contrat"];	
}
