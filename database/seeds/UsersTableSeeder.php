<?php

use Illuminate\Database\Seeder;

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
            'name' => 'John',
            'email' => 'john@fyibn.com',
            'password' => bcrypt('testing'),
        ]);

        DB::table('users')->insert([
            'name' => 'Bob',
            'email' => 'bob@fyibn.com',
            'password' => bcrypt('testing'),
        ]);

        DB::table('users')->insert([
            'name' => 'Mary',
            'email' => 'mary@fyibn.com',
            'password' => bcrypt('testing'),
        ]);
    }
}
