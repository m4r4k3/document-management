<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    public $table = "image"  ;
    public $fillable = ["path" , "size" ,"type"] ;
    
}
