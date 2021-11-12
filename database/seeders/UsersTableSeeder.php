<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
           
        DB::table('users')->insert([
            'role_id' => '1',
            'firstname' => 'Superadmin',
            'lastname' => 'Superdmin',
            'company_id' => '1',
            'email' => 'superadmin@admin.com',
            'phone' => '0804451628',
            'password' => bcrypt('password')
        ]);
        
        DB::table('users')->insert([
            'role_id' => '2',
            'firstname' => 'admin',
            'lastname' => 'admin',
            'company_id' => '1',
            'email' => 'admin@admin.com',
            'phone' => '0804451628',
            'password' => bcrypt('password')
        ]);
        
        DB::table('users')->insert([
            'role_id' => '3',
            'firstname' => 'company',
            'lastname' => 'Company',
            'company_id' => '1',
            'email' => 'company@admin.com',
            'phone' => '0804451628',
            'password' => bcrypt('password')
        ]);

        DB::table('users')->insert([
            'role_id' => '4',
            'firstname' => 'employee',
            'lastname' => 'Employee',
            'company_id' => '1',
            'email' => 'employee@admin.com',
            'phone' => '0804451628',
            'password' => bcrypt('password')
        ]);
    }
}
