<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes ;

class Client extends Model
{
    use SoftDeletes ;
    
    protected  $table = "client";
    protected $dates = ['deleted_at'];

    protected $fillable= [ "nom" ,"prenom",  "cin" ,"creer_par", "modifier_par"];
    
    public function creater (){
        return $this->hasOne(User::class , "id","creer_par" );
    }
    public function modifier_par (){
        return $this->hasOne(User::class , "id","modifier_par" );
    }
    public function order() {
        return $this->hasMany(Order::class ,"client_id" , "id") ;
    }
    use HasFactory;
}
