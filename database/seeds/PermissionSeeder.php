<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Permission;
class PermissionSeeder extends Seeder
{
    public function run()
    {
        //seeding permissions in database
        
        $permission = Permission::create([
            'name' => 'Create Job',
            'guard_name' => 'web',
        ]);        
        $permission->save();

        $permission = Permission::create([
            'name' => 'Show Job',
            'guard_name' => 'web',
        ]);        
        $permission->save();

        $permission = Permission::create([
            'name' => 'Edit Job',
            'guard_name' => 'web',
        ]);        
        $permission->save();

        $permission = Permission::create([
            'name' => 'Show Candidates',
            'guard_name' => 'web',
        ]);        
        $permission->save();

        $permission = Permission::create([
            'name' => 'Delete Job',
            'guard_name' => 'web',
        ]);        
        $permission->save();
    }
}
