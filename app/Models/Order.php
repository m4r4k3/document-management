<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public $table = "order";
    public $fillable =["client_id" ,"modifier_par","creer_par","cin","attestation","CG","PC","contrat"];	
    public function client () {
        return $this->hasOne(Client::class ,"id" ,"client_id");
    }
    public function creer_par (){
        return $this->hasOne(User::class , "id","creer_par" );
    }
    public function modifier_par (){
        return $this->hasOne(User::class , "id","modifier_par" );
    }
    
}
