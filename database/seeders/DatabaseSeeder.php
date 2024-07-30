<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Bike;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        (new RoleSeeder())->run();
        (new UserSeeder())->run();
        (new CustomerSeeder())->run();
        (new PlanSeeder())->run();
        (new MaterialSeeder())->run();
        (new TrademarkSeeder())->run();
        (new StatusSeeder())->run();
        (new CategorySeeder())->run();
        (new BikeModelSeeder())->run();
        Bike::factory(50)->create();
    }
}
