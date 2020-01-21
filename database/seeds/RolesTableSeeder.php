<?php

use Illuminate\Database\Seeder;

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
       array(
       'id' => '1',
       'name' => 'admin',
       'created_at' => now(),
       'updated_at' => now(),
   		),
       array(
       'id' => '2',
       'name' => 'doctor',
       'created_at' => now(),
       'updated_at' => now(),
   		),
       array(
       'id' => '3',
       'name' => 'headNurse',
       'created_at' => now(),
       'updated_at' => now(),
   		),
       array(
       'id' => '4',
       'name' => 'nurse',
       'created_at' => now(),
       'updated_at' => now(),
   		),
       array(
       'id' => '5',
       'name' => 'admission',
       'created_at' => now(),
       'updated_at' => now(),
   		),
       array(
       'id' => '6',
       'name' => 'medicalRecords',
       'created_at' => now(),
       'updated_at' => now(),
   		),
   ]);
    }
}
