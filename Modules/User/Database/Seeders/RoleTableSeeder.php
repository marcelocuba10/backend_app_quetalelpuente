<?php

namespace Modules\User\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

//spatie
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        Model::unguard();

        //Create role
        $role = Role::create([
            'name' => 'Usuario',
            'guard_name' => 'web',
            'system_role' => '1',
            'idReference' => 0
        ]);

        //Assign permissions
        $role->givePermissionTo('user-list');
        $role->givePermissionTo('webcam-list');
        $role->givePermissionTo('webcam-edit');
        $role->givePermissionTo('webcam-create');
        $role->givePermissionTo('webcam-delete');
    }
}
