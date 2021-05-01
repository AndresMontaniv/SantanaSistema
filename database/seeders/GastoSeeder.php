<?php

namespace Database\Seeders;

use App\Models\Gasto;
use Illuminate\Database\Seeder;

class GastoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //datos de prueba 
        $gasto1 = new Gasto();
        $gasto1-> idGastosPersonales = "1";
        $gasto1-> idPagosSB = "1" ;
        $gasto1->save();

        $gasto2 = new Gasto();
        $gasto2-> idGastosPersonales = "1";
        $gasto2-> idPagosSB = "2" ;
        $gasto2->save();

        $gasto3 = new Gasto();
        $gasto3-> idGastosPersonales = "2";
        $gasto3-> idPagosSB = "1" ;
        $gasto3->save();
    }
}
