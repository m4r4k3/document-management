<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected  $table = "client";
    protected $fillable= [ "nom" ,"prenom",  "cin" ,"creer_par", "modifier_par"];

    public function creater (){
        return $this->hasOne(User::class , "id","creer_par" );
    }
    public function modifier_par (){
        return $this->hasOne(User::class , "id","modifier_par" );
    }
    public function order () {
        return $this->belongsTo(Order::class , "client") ;
        }
    
}
