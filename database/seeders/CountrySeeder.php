<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countries = [
            
            [
                //1
                'name' => 'Moldova',
                'currency' => 'MDL',
                'country_code' => '+373',
            ],
            [
                //2
                'name' => 'Lebanon',
                'currency' => 'LBP',
                'country_code' => '+961',
            ]

        ];
        Country::insert($countries);
    }
}
