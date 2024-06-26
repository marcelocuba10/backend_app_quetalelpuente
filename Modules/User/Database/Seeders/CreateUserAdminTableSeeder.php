<?php

namespace Modules\User\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\User\Entities\User;

//spatie
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreateUserAdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $user =  User::create([
            'idReference' => 192004,
            'name' => 'Admin User teste',
            'last_name' => 'teste',
            'phone' => '168451212',
            'address' => 'av mensu 521',
            'doc_id' => '1234567',
            'email' => 'user@user.com',
            'password' => 'teste123',
            'status' => '1',
        ]);

        $role = Role::create([
            'name' => 'Admin', 
            'guard_name' => 'web',
            'system_role' => '1',
            'idReference' => 0
        ],);
        
        $permissions = Permission::where('guard_name', '=', 'web')->pluck('id', 'id')->all();
        $role->syncPermissions($permissions);
        $user->syncRoles(['Admin']);
        $user->assignRole([$role->id]);
    }
}
