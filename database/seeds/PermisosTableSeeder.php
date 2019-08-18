<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;

class PermisosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Lista de Permisos para Personas
        Permission::create(['name' => 'personas.save']); //Guardar
        Permission::create(['name' => 'personas.update']); //Editar
        Permission::create(['name' => 'personas.delete']); //Eliminar
        Permission::create(['name' => 'personas.edit.estado']); //Editar Estado de Apoyo
        Permission::create(['name' => 'personas.exportar']); //Exportar personas
        Permission::create(['name' => 'personas.importar']); //Importar personas

        //Lista de Permisos para Líderes
        Permission::create(['name' => 'lideres.save']); //Guardar
        Permission::create(['name' => 'lideres.update']); //Editar
        Permission::create(['name' => 'lideres.delete']); //Eliminar
        Permission::create(['name' => 'lideres.edit.estado']); //Editar Estado de Apoyo
        Permission::create(['name' => 'lideres.exportar']); //Exportar lideres
        Permission::create(['name' => 'lideres.importar']); //Importar lideres

        //Lista de Permisos para usuarios,
        Permission::create(['name' => 'users.index']); //ver usuarios
        Permission::create(['name' => 'users.create']); //crear usuarios

        //Roles y Permiso por cada rol
        //Super Administrador
        $superAdmin = Role::create(['name' => 'SuperAdmin']);
        $superAdmin->givePermissionTo(Permission::all());

        //Administrador
        $admin = Role::create(['name' => 'Admin']);
        $admin->givePermissionTo([
            //Personas
            'personas.save',
            'personas.update',
            'personas.delete',
            'personas.edit.estado',
            'personas.exportar',
            'personas.importar',

            //Líderes
            'lideres.save',
            'lideres.update',
            'lideres.delete',
            'lideres.edit.estado',
            'lideres.exportar',
            'lideres.importar',

            //usuarios
            'users.index',
            'users.create'
        ]);

        //Digitdor
        $digit = Role::create(['name' => 'Digitador']);
        $digit->givePermissionTo([
            'personas.save',
            'personas.update',
            'personas.delete',
            'personas.edit.estado',
            'lideres.save',
            'lideres.update',
            'lideres.delete',
            'lideres.edit.estado'
        ]);

        //Asignación de roles a usuarios
        $user1 = User::find(1);
        $user1->assignRole('SuperAdmin');

        $user1 = User::find(2);
        $user1->assignRole('SuperAdmin');

        $user2 = User::find(3);
        $user2->assignRole('Admin');

        $user3 = User::find(4);
        $user3->assignRole('Digitador');
    }
}
