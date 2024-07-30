<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statuses')->insert([
            'name' => 'Prêt à la location']);
        DB::table('statuses')->insert([
            'name' => 'Besoin de maintenance']);
        DB::table('statuses')->insert([
            'name' => 'En maintenance'
        ]);
    }
}
