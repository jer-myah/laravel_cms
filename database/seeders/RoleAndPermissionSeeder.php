<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create roles
        $admin_role = Role::create([
            'name' => 'Admin',
        ]);
        
        $editor_role = Role::create([
            'name' => 'Editor',
        ]);

        // Create permission
        Permission::create([
            'name' => 'create-users'
        ]);

        Permission::create([
            'name' => 'view-users'
        ]);

        Permission::create([
            'name' => 'edit-users'
        ]);

        Permission::create([
            'name' => 'delete-users'
        ]);

        Permission::create([
            'name' => 'create-pages'
        ]);

        Permission::create([
            'name' => 'view-pages'
        ]);

        Permission::create([
            'name' => 'edit-pages'
        ]);

        Permission::create([
            'name' => 'delete-pages'
        ]);

        Permission::create([
            'name' => 'create-categories'
        ]);

        Permission::create([
            'name' => 'view-categories'
        ]);

        Permission::create([
            'name' => 'edit-categories'
        ]);

        Permission::create([
            'name' => 'delete-categories'
        ]);

        Permission::create([
            'name' => 'view-admin'
        ]);

        Permission::create([
            'name' => 'view-dashboard'
        ]);

        // Assign permission to roles
        $admin_role->givePermissionTo([
            'create-users',
            'view-users',
            'edit-users',
            'delete-users',
            'create-pages',
            'view-pages',
            'edit-pages',
            'delete-pages',
            'create-categories',
            'view-categories',
            'edit-categories',
            'delete-categories',
            'view-admin',
            'view-dashboard',
        ]);

        $editor_role->givePermissionTo([
            'view-dashboard',
            'create-pages',
            'view-pages',
            'edit-pages',
        ]);
    }
}
