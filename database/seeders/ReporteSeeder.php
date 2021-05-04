<?php

namespace Database\Seeders;

use App\Models\Reporte;
use Illuminate\Database\Seeder;

class ReporteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reporte1 = new Reporte();
        $reporte1-> totalGastos = "1";
        $reporte1-> totalIngresos = "1" ;
        $reporte1-> general = "100.2";
        $reporte1->save();

        $reporte2 = new Reporte();
        $reporte2-> totalGastos = "1";
        $reporte2-> totalIngresos = "2" ;
        $reporte2-> general = "1.2";
        $reporte2->save();

        $reporte3 = new Reporte();
        $reporte3-> totalGastos = "2";
        $reporte3-> totalIngresos = "1" ;
        $reporte3-> general = "1212.2";
        $reporte3->save();

    }
}
