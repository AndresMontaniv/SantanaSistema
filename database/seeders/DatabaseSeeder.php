<?php

namespace Database\Seeders;
use App\Models\User;
use App\Models\Empleado;
use App\Models\Cliente;
use App\Models\Servicio;
use App\Models\Metodo;
use App\Models\Producto;
use App\Models\Gasto;

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
        $this->call(RoleSeeder::class);

        $user1 = new User();
        $user1->name = 'montano';
        $user1->email= 'montanoa63@gmail.com';
        $user1->password = bcrypt('montano');
        $user1->assignRole('Admin');
        $user1->save();

        $user2 = new User();
        $user2->name = 'zabach';
        $user2->email= 'zabach@gmail.com';
        $user2->password = bcrypt('zabach');
        $user2->assignRole('Admin');
        $user2->save();

        $user3 = new User();
        $user3->name = 'javier';
        $user3->email= 'javier@gmail.com';
        $user3->password = bcrypt('javier');
        $user3->assignRole('Admin');
        $user3->save();

        $user4 = new User();
        $user4->name = 'daniel';
        $user4->email= 'daniel@gmail.com';
        $user4->password = bcrypt('daniel');
        $user4->assignRole('Admin');
        $user4->save();

        $user5 = new User();
        $user5->name = 'harold';
        $user5->email= 'harold@gmail.com';
        $user5->password = bcrypt('harold');
        $user5->assignRole('Admin');
        $user5->save();

        $this->call(GastoSeeder::class);
        $this->call(IngresoSeeder::class);
        $this->call(ReporteSeeder::class);
        $this->call(ComprobanteSeeder::class);

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

        $producto1 = new Producto();
        $producto1->nombre = 'Producto 1';
        $producto1->precioDeCompra = '10';
        $producto1->precioDeVenta = '12';
        $producto1->stock = '0';
        $producto1->save();

        $producto2 = new Producto();
        $producto2->nombre = 'Producto 2';
        $producto2->precioDeCompra = '20';
        $producto2->precioDeVenta = '22';
        $producto2->stock = '0';
        $producto2->save();

        $producto3 = new Producto();
        $producto3->nombre = 'Producto 3';
        $producto3->precioDeCompra = '30';
        $producto3->precioDeVenta = '32';
        $producto3->stock = '0';
        $producto3->save();
    }
}
