<?php

use Illuminate\Database\Seeder;

class AppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('events')->insert([
            [
                'patient_id' => '001',
                'user_id' => '23',
                'title' => 'Check-up',                
                'start' => '2020-02-25 13:00',
                'end' => '2020-02-25 14:00',
                'color' => '#008080',
                'description' => 'Follow-up'
            ]            
        ]);
    }
}
