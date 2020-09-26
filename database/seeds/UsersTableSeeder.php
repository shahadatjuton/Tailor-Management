<?php

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
        DB::table('users')->insert([
           'name'=> 'Admin',
            'role_id' => 1,
            'email'=>'admin@gmail.com',
            'password' => bcrypt('admin123'),
        ]);
        DB::table('users')->insert([
            'name'=> 'Staff',
            'role_id' => 2,
            'email'=>'staff@gmail.com',
            'password' => bcrypt('staff123'),
        ]);
        DB::table('users')->insert([
            'name'=> 'Customer',
            'role_id' => 3,
            'email'=>'customer@gmail.com',
            'password' => bcrypt('customer123'),
        ]);
    }
}
