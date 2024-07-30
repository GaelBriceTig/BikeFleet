<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class BikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bikes')->insert([
            'serial_number' => '0548153 520120',
            'manufacture_date' => '15-12-2020',
            'bike_model_id' => '1',
            'status_id' => '3'
        ]);
    }
}
