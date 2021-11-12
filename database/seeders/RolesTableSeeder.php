<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('roles')->insert([
            'role_name' => 'SuperAdmin',
            'role_slug' => 'superadmin',
        ]);
        
        DB::table('roles')->insert([
            'role_name' => 'Admin',
            'role_slug' => 'admin',
        ]);
        
        DB::table('roles')->insert([
            'role_name' => 'Company',
            'role_slug' => 'company',
        ]);

        DB::table('roles')->insert([
            'role_name' => 'Employee',
            'role_slug' => 'employee',
        ]);
    }
}
