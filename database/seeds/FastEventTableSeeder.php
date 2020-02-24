<?php

use Illuminate\Database\Seeder;

class FastEventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('fast_events')->insert([
            [                
                'title' => 'Surgery',               
                'start' => '2020-02-25 13:00',
                'end' => '2020-02-25 14:00',                
                'color' => '#008080'                
            ]            
        ]);
    }
}
