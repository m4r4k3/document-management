<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Historique extends Model
{
    use SoftDeletes ;
    protected $dates = ['deleted_at'];
    protected $fillable = ["order", "by", "from", "to", "case" ,"action"];
    public function order()
    {
        return $this->hasOne(Order::class, "id", "order");

    }
    public function by()
    {
        return $this->hasOne(User::class, "id", "by");

    }
    use HasFactory;
}
