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
            'name' => 'admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'role_id' => '1'
        ]);

        DB::table('users')->insert([
            'name' => 'user',
            'username' => 'user',
            'email' => 'user@gmail.com',
            'password' => bcrypt('password'),
            'role_id' => '2'
        ]);

        DB::table('users')->insert([
            'name' => 'Rob',
            'username' => 'rob',
            'email' => 'j.vdkruit@ziggo.nl.com',
            'password' => bcrypt('password'),
            'role_id' => '1'
        ]);
    }
}
