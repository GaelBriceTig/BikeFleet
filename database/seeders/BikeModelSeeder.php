<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BikeModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bike_models')->insert([
            'name' => 'Manhattan luxe 28"',
            'description' => 'Avec ses roues 28" vous avalerez les kilomètres avec confort.',
            'trademark_id' => 14,
            'category_id' => 3,
            'material_id' => 1,
            'extra_price' => 14.5,
        ]);

        DB::table('bike_models')->insert([
            'name' => 'Le vélo électrique',
            'description' => 'Easy, est chic, léger, survolté pour des balades sans effort jusque dans l\'Ile de Ré.',
            'trademark_id' => 1,
            'category_id' => 2,
            'material_id' => 1,
            'extra_price' => 5.2,
        ]);

        DB::table('bike_models')->insert([
            'name' => 'Beach cruiser',
            'description' => 'Un vélo sympa pour découvrir le bord de mer en toute tranquillité.',
            'trademark_id' => 1,
            'category_id' => 3,
            'material_id' => 1,
            'extra_price' => 0,
        ]);
    }
}
