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
        $reprote1 = new Reporte();
        $reprote1-> idGastos = "1";
        $reprote1-> idIngresos = "111" ;
        $reprote1->save();

        $reprote2 = new Reporte();
        $reprote2-> idGastos = "232";
        $reprote2-> idIngresos = "111" ;
        $reprote2->save();

    }
}
