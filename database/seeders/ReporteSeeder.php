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
        $reporte1-> nombre = 'Mayo';
        $reporte1-> totalGastos = 0.0;
        $reporte1-> totalIngresos = 0.0;
        $reporte1-> general = 0.0;
        $reporte1->save();

    }
}
