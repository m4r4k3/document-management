<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes ;
class Order extends Model
{
    use HasFactory;
    public $table = "order";
    protected $dates = ['deleted_at'];

    public $fillable =["client_id" ,"modifier_par","creer_par","cin","attestation","CG","PC","contrat"];	
    public function client () {
        return $this->hasOne(Client::class ,"id" ,"client_id");
    }
    public function creater (){
        return $this->hasOne(User::class , "id","creer_par" );
    }
    public function modifier_par (){
        return $this->hasMany(User::class , "id","modifier_par" );
    }
    public function cinDoc()
    {
        return $this->belongsTo(Image::class, 'cin', 'id');
    }

    public function attestationDoc()
    {
        return $this->belongsTo(Image::class, 'attestation', 'id');
    }

    public function cgDoc()
    {
        return $this->belongsTo(Image::class, 'CG', 'id');
    }

    public function pcDoc()
    {
        return $this->belongsTo(Image::class, 'PC', 'id');
    }

    public function contratDoc()
    {
        return $this->belongsTo(Image::class, 'contrat', 'id');
    }
    use SoftDeletes ;
    
}
