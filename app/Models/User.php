<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    protected $table ="user";
    protected $fillable =["user", "password", "creater","nom" ,"prenom" ,"role" ,"cin",'remember_token'];
    protected $hidden = [
        "user" ,
        'password', // Add any other sensitive fields here
        'remember_token', // Example: If you want to hide the remember_token as well
    ];
    function actions() {
        return $this->hasMany(Historique::class ,"by" ,"id") ;
    }
    function creater(){
        return $this->hasOne(User::class , "creater" , "id") ;
    }
    function children(){
        return  $this->belongsTo(User::class ) ;
    }
 
}
