<?php

namespace Database\Seeders;

use App\Models\Branch;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $branches = [
            [
                //1
                'merchant_id' => 1,
                'city' => 'tokyo',
                'latitude'=> 51.0258761,
                'longitude'=> 4.4775362,
                'language' => 'eng',
                'country_id' => 1,
                
            ],

            [
                //2
                'merchant_id' => 2,
                'city' => 'tokyo',
                'latitude'=> 58.0258761,
                'longitude'=> 4.4775362,
                'language' => 'eng',
                'country_id' => 1,
                
            ],
            [
                //3
                'merchant_id' => 3,
                'city' => 'tokyo',
                'latitude'=> 56.0258761,
                'longitude'=> 4.4775362,
                'language' => 'eng',
                'country_id' => 1,
                
            ],
            [
                //4

                'merchant_id' => 4,
                'city' => 'tokyo',
                'latitude'=> 55.0258761,
                'longitude'=> 4.4775362,
                'language' => 'eng',
                'country_id' => 1,

            ],
            [
                //5

                'merchant_id' => 5,
                'city' => 'tokyo',
                'latitude'=> 50.0258461,
                'longitude'=> 4.4775362,
                'language' => 'eng',
                'country_id' => 1,
                
            ],
            [
                //6

                'merchant_id' => 6,
                'city' => 'tokyo',
                'latitude'=> 51.0258761,
                'longitude'=> 3.4775362,
                'language' => 'eng',
                'country_id' => 1,
               

            ],
            [
                //7
                'merchant_id' => 7,
                'city' => 'tokyo',
                'latitude'=> 51.0258761,
                'longitude'=> 2.4775362,
                'language' => 'eng',
                'country_id' => 1,
                
            ],
            [
                //8
                'merchant_id' => 2,
                'city' => 'tokyo1',
                'latitude'=> 53.0258761,
                'longitude'=> 3.4775362,
                'language' => 'eng',
                'country_id' => 1,
                
            ],
             
            
            
        ];
        Branch::insert($branches);
    }
}
