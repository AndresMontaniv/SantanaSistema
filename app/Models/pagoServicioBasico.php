<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pagoServicioBasico extends Model
{
    use HasFactory;
    protected $table="pago_servicio_basicos";
    protected $fillable=['servicioBasico_id','monto'];
}
