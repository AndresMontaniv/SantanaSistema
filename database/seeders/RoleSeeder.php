<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name'=> 'Admin']);

        Permission::create(['name' => 'ver lista empleados'])->syncRoles([$role1]);
        Permission::create(['name' => 'registrar empleado'])->syncRoles([$role1]);
        Permission::create(['name' => 'eliminar empleado'])->syncRoles([$role1]);
        Permission::create(['name' => 'editar empleado'])->syncRoles([$role1]);
        Permission::create(['name' => 'ver empleado'])->syncRoles([$role1]);

        Permission::create(['name' => 'ver lista de clientes'])->syncRoles([$role1]);
        Permission::create(['name' => 'registrar cliente'])->syncRoles([$role1]);
        Permission::create(['name' => 'eliminar cliente'])->syncRoles([$role1]);
        Permission::create(['name' => 'editar cliente'])->syncRoles([$role1]);
        Permission::create(['name' => 'ver cliente'])->syncRoles([$role1]);

        Permission::create(['name' => 'ver lista de compras'])->syncRoles([$role1]);
        Permission::create(['name' => 'registrar compra'])->syncRoles([$role1]);
        Permission::create(['name' => 'eliminar compra'])->syncRoles([$role1]);
        Permission::create(['name' => 'editar compra'])->syncRoles([$role1]);
        Permission::create(['name' => 'ver compra'])->syncRoles([$role1]);

        Permission::create(['name' => 'ver lista de ventas'])->syncRoles([$role1]);
        Permission::create(['name' => 'registrar venta'])->syncRoles([$role1]);
        Permission::create(['name' => 'eliminar venta'])->syncRoles([$role1]);
        Permission::create(['name' => 'editar venta'])->syncRoles([$role1]);
        Permission::create(['name' => 'ver venta'])->syncRoles([$role1]);

        Permission::create(['name' => 'ver lista de productos'])->syncRoles([$role1]);
        Permission::create(['name' => 'registrar producto'])->syncRoles([$role1]);
        Permission::create(['name' => 'eliminar producto'])->syncRoles([$role1]);
        Permission::create(['name' => 'editar producto'])->syncRoles([$role1]);
        Permission::create(['name' => 'ver producto'])->syncRoles([$role1]);

        Permission::create(['name' => 'ver lista de atenciones'])->syncRoles([$role1]);
        Permission::create(['name' => 'registrar atencion'])->syncRoles([$role1]);
        Permission::create(['name' => 'eliminar atencion'])->syncRoles([$role1]);
        Permission::create(['name' => 'editar atencion'])->syncRoles([$role1]);
        Permission::create(['name' => 'ver atencion'])->syncRoles([$role1]);

        Permission::create(['name' => 'ver lista de servicios'])->syncRoles([$role1]);
        Permission::create(['name' => 'registrar servicion'])->syncRoles([$role1]);
        Permission::create(['name' => 'eliminar servicios'])->syncRoles([$role1]);
        Permission::create(['name' => 'editar servicios'])->syncRoles([$role1]);
        Permission::create(['name' => 'ver servicios'])->syncRoles([$role1]);

        Permission::create(['name' => 'ver lista de pagos'])->syncRoles([$role1]);
        Permission::create(['name' => 'registrar pago'])->syncRoles([$role1]);
        Permission::create(['name' => 'eliminar pago'])->syncRoles([$role1]);
        Permission::create(['name' => 'editar pago'])->syncRoles([$role1]);
        Permission::create(['name' => 'ver pago'])->syncRoles([$role1]);

        Permission::create(['name' => 'ver lista de gastos personales'])->syncRoles([$role1]);
        Permission::create(['name' => 'registrar gasto personal'])->syncRoles([$role1]);
        Permission::create(['name' => 'eliminar gasto personal'])->syncRoles([$role1]);
        Permission::create(['name' => 'editar gasto personal'])->syncRoles([$role1]);
        Permission::create(['name' => 'ver gasto personal'])->syncRoles([$role1]);

        Permission::create(['name' => 'ver lista de usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'registrar usuario'])->syncRoles([$role1]);
        Permission::create(['name' => 'eliminar usuario'])->syncRoles([$role1]);
        Permission::create(['name' => 'editar usuario'])->syncRoles([$role1]);
        Permission::create(['name' => 'ver usuario'])->syncRoles([$role1]);

        Permission::create(['name' => 'ver lista de roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'registrar rol'])->syncRoles([$role1]);
        Permission::create(['name' => 'eliminar rol'])->syncRoles([$role1]);
        Permission::create(['name' => 'editar rol'])->syncRoles([$role1]);
        Permission::create(['name' => 'ver rol'])->syncRoles([$role1]);

        //Permission::create(['name' => '']);
        





        
    }
}
