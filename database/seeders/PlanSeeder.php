<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Plan;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plans = [
            [
                'name' => 'Basique',
                'slug' => 'basique',
                'stripe_plan' => 'price_1M1BH7BhvJ8fKFymwLQCiqPN',
                'price' => 5,
                'description' => 'Basique'
            ],
            [
                'name' => 'Confort',
                'slug' => 'confort',
                'stripe_plan' => 'price_1M1BImBhvJ8fKFymOqRiWCZX',
                'price' => 10,
                'description' => 'Confort'
            ],
            [
                'name' => 'Premium',
                'slug' => 'premium',
                'stripe_plan' => 'price_1M1BJABhvJ8fKFymsnUtKpfM',
                'price' => 15,
                'description' => 'Premium'
            ]
        ];

        foreach ($plans as $plan) {
            Plan::create($plan);
        }
    }
}
