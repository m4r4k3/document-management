<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Historique extends Model
{
    use SoftDeletes ;
    public $table ="historique" ;
    protected $dates = ['deleted_at'];
    protected $fillable = ["order", "by", "from", "to", "case" ,"action"];
    public function order()
    {
        return $this->belongsTo(Order::class);

    }
    public function byName()
    {
        return $this->belongsTo(User::class , "by" , "id");

    }
    public function actionName()
    {
        return $this->belongsTo(TypeAction::class , "action" , "id");

    }
    use HasFactory;
}
