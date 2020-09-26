<?php

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
        DB::table('roles')->insert([
           'role_name'=> 'Admin',
            'slug' => 'admin',
        ]);
        DB::table('roles')->insert([
            'role_name'=> 'Staff',
            'slug' => 'staff',
        ]);
        DB::table('roles')->insert([
            'role_name'=> 'Customer',
            'slug' => 'customer',
        ]);
    }
}
