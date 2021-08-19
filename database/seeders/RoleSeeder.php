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
      $role1 = Role::create(['name' => 'Admin']);
      $role2 = Role::create(['name' => 'Redactor']);
      $role3 = Role::create(['name' => 'Editor']);

      Permission::create(['name' => 'admin.home', 
                          'description' => 'Ver el dashboard'])->syncRoles([$role1, $role2, $role3]);

      Permission::create(['name' => 'admin.users.index', 
                          'description' => 'Ver Listado de Usuarios'])->syncRoles([$role1]);
      Permission::create(['name' => 'admin.users.edit', 
                          'description' => 'Asignar un rol'])->syncRoles([$role1]);
      
      Permission::create(['name' => 'admin.categories.index',
                          'description' => 'Ver Listado de Categorias'])->syncRoles([$role1]);
      Permission::create(['name' => 'admin.categories.create',
                          'description' => 'Crear Categorias'])->syncRoles([$role1]);
      Permission::create(['name' => 'admin.categories.edit', 
                          'description' => 'Editar Categorias'])->syncRoles([$role1]);
      Permission::create(['name' => 'admin.categories.destroy', 
                          'description' => 'Elimnar Categorias'])->syncRoles([$role1]);

      Permission::create(['name' => 'admin.tags.index', 
                          'description' => 'Ver listado de etiquetas'])->syncRoles([$role1]);
      Permission::create(['name' => 'admin.tags.create', 
                          'description' => 'Crear etiquetas'])->syncRoles([$role1]);
      Permission::create(['name' => 'admin.tags.edit', 
                          'description' => 'Editar etiquetas'])->syncRoles([$role1]);
      Permission::create(['name' => 'admin.tags.destroy', 
                          'description' => 'Eliminar etiquetas'])->syncRoles([$role1]);

      Permission::create(['name' => 'admin.posts.index', 
                          'description' => 'Ver listado de posts'])->syncRoles([$role1, $role2]);
      Permission::create(['name' => 'admin.posts.create', 
                          'description' => 'Crear posts'])->syncRoles([$role1, $role2, $role3]);
      Permission::create(['name' => 'admin.posts.edit', 
                          'description' => 'Editar posts'])->syncRoles([$role1, $role2, $role3]);
      Permission::create(['name' => 'admin.posts.destroy', 
                          'description' => 'Eliminar posts'])->syncRoles([$role1, $role2, $role3]);

      Permission::create(['name' => 'admin.postsa.index', 
                          'description' => 'Ver listado de todos los posts'])->syncRoles([$role1, $role3]);

      Permission::create(['name' => 'admin.postsa.edit', 
                          'description' => 'Editar Post Publicado'])->syncRoles([$role1, $role3]);
      Permission::create(['name' => 'admin.postsa.destroy', 
                          'description' => 'Eliminar Post Publicado'])->syncRoles([$role1,$role3]);                    

      
    }
}