<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use App\Permission;
use App\RoleHasPermission;
use App\ModelHasPermission;
use App\ModelHasRole;

class UserSeeder extends Seeder
{
    public function run()
    {
        //seeding users in database
        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => ('password')
        ]);
        $user->save();

        $user = User::create([
            'name' => 'User',
            'email' => 'user@user.com',
            'password' => ('password')
        ]);
        $user->save();

        //seeding permission for Admin in database
        $permission = Permission::create([
            'name' => 'Administer roles & permissions',
            'guard_name' => 'web',
        ]);        
        $permission->save();
        
         //seeding role for Admin in database
        $role = Role::create([
            'name' => 'Admin',
            'guard_name' => 'web',
        ]);        
        $role->save();

        //seeding role has permission for Admin in database
        $rolehaspermission = RoleHasPermission::create([
            'permission_id' => '1',
            'role_id' => '1',
        ]);
        $rolehaspermission->save();


        //seeding model has permission for Admin in database
        $modelhasrole = ModelHasRole::create([
            'role_id' => '1',
            'model_type' => 'App\User',
            'model_id' => '1',
        ]);        
        $modelhasrole->save();
    }
}
