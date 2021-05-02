<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gastoPersonal extends Model
{
    use HasFactory;
    protected $table="gasto_personals";
    protected $fillable=['detalle','precio'];
}
