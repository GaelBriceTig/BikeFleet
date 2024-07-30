<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'Vélo de ville']);
        DB::table('categories')->insert([
            'name' => 'Vélo électrique']);
        DB::table('categories')->insert([
            'name' => 'VTT']);
        DB::table('categories')->insert([
            'name' => 'Vélo pliable']);
    }
}



