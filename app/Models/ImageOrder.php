<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageOrder extends Model
{
    use HasFactory;
    public $table ="imageOrder" ;
    public $fillable =["image_id" , "order_id"] ;
}
