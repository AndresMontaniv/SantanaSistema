<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gasto extends Model
{
    use HasFactory;
    protected $table="gastos";
    protected $guarded=['id','created_at','updated_at'];

    public function gasto_perosnals(){
        return $this->belongsToMany(gasto_perosnals::class);
    //protected $fillable =['idProveedor','idGastosPersonales','idPagoSB'];

}
