<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeAction extends Model
{

    use HasFactory;
    public $table = "type_action" ;
    public function action () {
        return $this->belongsTo(Historique::class) ;
    }
}
