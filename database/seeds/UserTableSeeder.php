<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
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
        	'name' => 'Danifae',
        	'email' => 'danifae@gmail.com',
        	'role' => 'admin',
        	'password' => bcrypt('goddessacoe'),
        	'created_at' => now(),
        	'updated_at' => now(),
        ]);
    }
}
