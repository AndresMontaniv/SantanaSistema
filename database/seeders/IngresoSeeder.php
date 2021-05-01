<?php

namespace Database\Seeders;

use App\Models\Ingreso;
use Illuminate\Database\Seeder;

class IngresoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ingresos1 = new Ingreso();
        $ingresos1-> idVentas = "1";
        $ingresos1-> idPagos = "1" ;
        $ingresos1->save();

        $ingresos2 = new Ingreso();
        $ingresos2-> idVentas = "10";
        $ingresos2-> idPagos = "22" ;
        $ingresos2->save();

        $ingresos3 = new Ingreso();
        $ingresos3-> idVentas = "33";
        $ingresos3-> idPagos = "44" ;
        $ingresos3->save();
        
    }
}
