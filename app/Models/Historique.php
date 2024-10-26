<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historique extends Model
{
    protected $fillable = ["order", "by", "from", "to", "case"];
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
