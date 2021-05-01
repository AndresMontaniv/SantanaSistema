<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gasto extends Model
{
    use HasFactory;
    protected $table="gastos";
    protected $guarded=['id','created_at','updated_at'];

    //protected $fillable =['idProveedor','idGastosPersonales','idPagoSB'];

}
