<?php

namespace Database\Seeders;

use App\Models\Comprobante;
use Illuminate\Database\Seeder;

class ComprobanteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comprobante1 = new Comprobante();
        $comprobante1-> nombre = "cr7";
        $comprobante1->save();

        $comprobante2 = new Comprobante();
        $comprobante2-> nombre = "brrrr";
        $comprobante2->save();
    }
}
