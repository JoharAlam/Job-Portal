<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
class RoleSeeder extends Seeder
{
    public function run()
    {
        //seeding roles in database

        $role = Role::create([
            'name' => 'Manager',
            'guard_name' => 'web',
        ]);        
        $role->save();

        $role = Role::create([
            'name' => 'User',
            'guard_name' => 'web',
        ]);        
        $role->save();
    }
}
