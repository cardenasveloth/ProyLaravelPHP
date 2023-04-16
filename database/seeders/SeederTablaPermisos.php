<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class SeederTablaPermisos extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permisos=[
            //tabla roles
            'ver-rol',
            'crear-rol',
            'editar-rol',
            'borrar-rol',
            //tabla Categorias 
            'ver-category',
            'crear-category',
            'editar-category',
            'borrar-category',
            //tabla Post 
            'ver-Post',
            'crear-Post',
            'editar-Post',
            'borrar-Post',
            //tabla usuarios
            'ver-usuario',
            'crear-usuario',
            'editar-usuario',
            'borrar-usuario',

        ];
        foreach($permisos as $permiso){
            Permission::create(['name'=>$permiso]);
        }
        
    }
}
