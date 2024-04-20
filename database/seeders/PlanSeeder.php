<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
                
                'name' => "Basic",
                'price' => 300,
                'description' => "have access to all the features of the platform and can use it for 3 months.",
                'duration' => 3

            ],
            [
                
                'name' => "Standard",
                'price' => 600,
                'description' => "have access to all the features of the platform and can use it for 6 months.",
                'duration' => 6

            ],

            [
                
                'name' => "Premium",
                'price' => 1200,
                'description' => "have access to all the features of the platform and can use it for 1 year.",
                'duration' => 12
            ]
        ];
        Plan::insert($plans);
    }
}
