<?php

namespace Database\Seeders;
use App\Models\User;
use App\Models\Empleado;
use App\Models\Cliente;
use App\Models\Servicio;
use App\Models\Metodo;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $user1 = new User();
        $user1->name = 'montano';
        $user1->email= 'montanoa63@gmail.com';
        $user1->password = bcrypt('montano');
        $user1->save();

        $user2 = new User();
        $user2->name = 'zabach';
        $user2->email= 'zabach@gmail.com';
        $user2->password = bcrypt('zabach');
        $user2->save();

        $user3 = new User();
        $user3->name = 'javier';
        $user3->email= 'javier@gmail.com';
        $user3->password = bcrypt('javier');
        $user3->save();

        $user4 = new User();
        $user4->name = 'daniel';
        $user4->email= 'daniel@gmail.com';
        $user4->password = bcrypt('daniel');
        $user4->save();

        $user5 = new User();
        $user5->name = 'harold';
        $user5->email= 'harold@gmail.com';
        $user5->password = bcrypt('harold');
        $user5->save();

        $empleado1 = new Empleado();
        $empleado1->ci = '123456789';
        $empleado1->nombre = 'Empleado Numero Uno';
        $empleado1->sexo = 'M';
        $empleado1->fechaNac = '2021-04-25';
        $empleado1->telefono = '987654321';
        $empleado1->save();

        $empleado2 = new Empleado();
        $empleado2->ci = '123456789';
        $empleado2->nombre = 'Empleado Numero Dos';
        $empleado2->sexo = 'F';
        $empleado2->fechaNac = '2021-04-24';
        $empleado2->telefono = '987654321';
        $empleado2->save();

        $cliente1 = new Cliente();
        $cliente1->nombre = 'Cliente Numero Uno';
        $cliente1->sexo = 'M';
        $cliente1->fechaNac = '2021-04-24';
        $cliente1->telefono = '987654321';
        $cliente1->email = 'santana1@gmail.com';
        $cliente1->save();

        $cliente2 = new Cliente();
        $cliente2->nombre = 'Cliente Numero Dos';
        $cliente2->sexo = 'F';
        $cliente2->fechaNac = '2021-04-25';
        $cliente2->telefono = '987654321';
        $cliente2->email = 'santana2@gmail.com';
        $cliente2->save();

        $cliente3 = new Cliente();
        $cliente3->nombre = 'Cliente No Registrado';
        $cliente3->sexo = 'U';
        $cliente3->save();

        $servicio1 = new Servicio();
        $servicio1->nombre = 'Corte';
        $servicio1->precio = '40';
        $servicio1->save();

        $servicio2 = new Servicio();
        $servicio2->nombre = 'Corte + Barba';
        $servicio2->precio = '60';
        $servicio2->save();

        $servicio3 = new Servicio();
        $servicio3->nombre = 'Corte + Alaciado';
        $servicio3->precio = '100';
        $servicio3->save();

        $servicio4 = new Servicio();
        $servicio4->nombre = 'Barba';
        $servicio4->precio = '20';
        $servicio4->save();

        $servicio5 = new Servicio();
        $servicio5->nombre = 'Alaciado';
        $servicio5->precio = '60';
        $servicio5->save();

        $metodo1 = new Metodo();
        $metodo1->nombre = 'Efectivo';
        $metodo1->save();

        $metodo2 = new Metodo();
        $metodo2->nombre = 'Transferencia';
        $metodo2->save();

        $metodo3 = new Metodo();
        $metodo3->nombre = 'Tarjeta';
        $metodo3->save();
    }
}
