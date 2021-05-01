<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class servicioBasico extends Model
{
    use HasFactory;
    protected $table="servicio_basicos";
    protected $fillable=['nombre'];
}
