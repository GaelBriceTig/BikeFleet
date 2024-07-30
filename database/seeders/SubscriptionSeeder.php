<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SubscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subscriptions')->insert([
            'name' => 'Solo',
            'duration' => '1',
            'ratio' => '1',
            'isAutomaticRenewal' => true,
        ]);

        DB::table('subscriptions')->insert([
            'name' => 'Duo',
            'duration' => '1',
            'ratio' => '0.9',
            'isAutomaticRenewal' => true,
        ]);

        DB::table('subscriptions')->insert([
            'name' => 'Family',
            'duration' => '1',
            'ratio' => '0.9',
            'isAutomaticRenewal' => true,
        ]);
    }
}
