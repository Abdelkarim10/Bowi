<?php

namespace Database\Seeders;

use App\Models\UserOffer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserOfferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userOffers = [
            [
                //1
                'user_id' => 1,
                'offer_id' => 1,
                'saving' => 200,
                'expire_date' => '2022-12-31',
                'created_at' => '2022-10-01 00:00:00',
                'updated_at' => '2022-10-01 00:00:00',
                'code' => '1',
            ],
            [
                //2
                'user_id' => 1,
                'offer_id' => 1,
                'saving' => 250,
                'expire_date' => '2022-12-31',
                'created_at' => '2022-9-01 00:00:00',
                'updated_at' => '2022-9-01 00:00:00',
                'code' => '12',
            ],
            [
                //2
                'user_id' => 1,
                'offer_id' => 1,
                'saving' => 750,
                'expire_date' => '2022-12-31',
                'created_at' => '2022-9-01 00:00:00',
                'updated_at' => '2022-9-01 00:00:00',
                'code' => '123',
            ],
            [
                //2
                'user_id' => 1,
                'offer_id' => 1,
                'saving' => 750,
                'expire_date' => '2022-12-31',
                'created_at' => '2022-9-01 00:00:00',
                'updated_at' => '2022-9-01 00:00:00',
                'code' => '1234',
            ],
            [
                //2
                'user_id' => 1,
                'offer_id' => 1,
                'saving' => 750,
                'expire_date' => '2022-12-31',
                'created_at' => '2022-9-01 00:00:00',
                'updated_at' => '2022-9-01 00:00:00',
                'code' => '12345',
            ],
            [
                //2
                'user_id' => 1,
                'offer_id' => 1,
                'saving' => 750,
                'expire_date' => '2022-12-31',
                'created_at' => '2022-9-01 00:00:00',
                'updated_at' => '2022-9-01 00:00:00',
                'code' => '123456',
            ],
            [
                //2
                'user_id' => 1,
                'offer_id' => 1,
                'saving' => 750,
                'expire_date' => '2022-12-31',
                'created_at' => '2022-9-01 00:00:00',
                'updated_at' => '2022-9-01 00:00:00',
                'code' => '1234567',
            ],
            [
                //3
                'user_id' => 1,
                'offer_id' => 1,
                'saving' => 300,
                'expire_date' => '2022-12-31',
                'created_at' => '2022-8-01 00:00:00',
                'updated_at' => '2022-8-01 00:00:00',
                'code' => '12345678',
            ],
            [
                //4
                'user_id' => 1,
                'offer_id' => 1,
                'saving' => 200,
                'expire_date' => '2022-12-31',
                'created_at' => '2022-7-01 00:00:00',
                'updated_at' => '2022-7-01 00:00:00',
                'code' => '123456789',
            ],
            [
                //5
                'user_id' => 1,
                'offer_id' => 1,
                'saving' => 300,
                'expire_date' => '2022-12-31',
                'created_at' => '2022-6-01 00:00:00',
                'updated_at' => '2022-6-01 00:00:00',
                'code' => '10',
            ],
            [
                //6
                'user_id' => 1,
                'offer_id' => 2,
                'saving' => 125,
                'expire_date' => '2022-12-31',
                'created_at' => '2022-5-01 00:00:00',
                'updated_at' => '2022-5-01 00:00:00',
                'code' => '11',
            ],
            [
                //7
                'user_id' => 1,
                'offer_id' => 2,
                'saving' => 125,
                'expire_date' => '2022-12-31',
                'created_at' => '2022-4-01 00:00:00',
                'updated_at' => '2022-4-01 00:00:00',
                'code' => '12',
            ],
            [
                //8
                'user_id' => 2,
                'offer_id' => 2,
                'saving' => 400,
                'expire_date' => '2022-12-31',
                'created_at' => '2022-10-01 00:00:00',
                'updated_at' => '2022-10-01 00:00:00',
                'code' => '13',
            ],
            [
                //9
                'user_id' => 2,
                'offer_id' => 2,
                'saving' => 400,
                'expire_date' => '2022-12-31',
                'created_at' => '2022-9-01 00:00:00',
                'updated_at' => '2022-9-01 00:00:00',
                'code' => '14',
            ],
            [
                //10
                'user_id' => 2,
                'offer_id' => 2,
                'saving' => 400,
                'expire_date' => '2022-12-31',
                'created_at' => '2022-8-01 00:00:00',
                'updated_at' => '2022-8-01 00:00:00',
                'code' => '15',
            ],
            [
                //11
                'user_id' => 2,
                'offer_id' => 2,
                'saving' => 400,
                'expire_date' => '2022-12-31',
                'created_at' => '2022-7-01 00:00:00',
                'updated_at' => '2022-7-01 00:00:00',
                'code' => '16',
            ],
            [
                //12
                'user_id' => 2,
                'offer_id' => 2,
                'saving' => 400,
                'expire_date' => '2022-12-31',
                'created_at' => '2022-6-01 00:00:00',
                'updated_at' => '2022-6-01 00:00:00',
                'code' => '17',
            ],
            [
                //13
                'user_id' => 2,
                'offer_id' => 3,
                'saving' => 400,
                'expire_date' => '2022-12-31',
                'created_at' => '2022-5-01 00:00:00',
                'updated_at' => '2022-5-01 00:00:00',
                'code' => '18',
            ],
            
            [
                //14
                'user_id' => 2,
                'offer_id' => 6,
                'saving' => 400,
                'expire_date' => '2022-12-31',
                'created_at' => '2022-4-01 00:00:00',
                'updated_at' => '2022-4-01 00:00:00',
                'code' => '19',
            ],
            [
                //15
                'user_id' => 3,
                'offer_id' => 6,
                'saving' => 200,
                'expire_date' => '2022-12-31',
                'created_at' => '2022-10-01 00:00:00',
                'updated_at' => '2022-10-01 00:00:00',
                'code' => '20',
            ],
            [
                //16
                'user_id' => 3,
                'offer_id' => 6,
                'saving' => 269,
                'expire_date' => '2022-12-31',
                'created_at' => '2022-9-01 00:00:00',
                'updated_at' => '2022-9-01 00:00:00',
                'code' => '21',
            ],
            [
                //17
                'user_id' => 3,
                'offer_id' => 6,
                'saving' => 200,
                'expire_date' => '2022-12-31',
                'created_at' => '2022-8-01 00:00:00',
                'updated_at' => '2022-8-01 00:00:00',
                'code' => '22',
            ],
            [
                //18
                'user_id' => 3,
                'offer_id' => 6,
                'saving' => 200,
                'expire_date' => '2022-12-31',
                'created_at' => '2022-7-01 00:00:00',
                'updated_at' => '2022-7-01 00:00:00',
                'code' => '23',
            ],
            [
                //19
                'user_id' => 3,
                'offer_id' => 4,
                'saving' => 200,
                'expire_date' => '2022-12-31',
                'created_at' => '2022-6-01 00:00:00',
                'updated_at' => '2022-6-01 00:00:00',
                'code' => '24',
            ],
            [
                //20
                'user_id' => 3,
                'offer_id' => 4,
                'saving' => 200,
                'expire_date' => '2022-12-31',
                'created_at' => '2022-5-01 00:00:00',
                'updated_at' => '2022-5-01 00:00:00',
                'code' => '25',
            ],
            
            [
                //21
                'user_id' => 3,
                'offer_id' => 5,
                'saving' => 200,
                'expire_date' => '2022-12-31',
                'created_at' => '2022-4-01 00:00:00',
                'updated_at' => '2022-4-01 00:00:00',
                'code' => '26',
            ],
            [
                //22
                'user_id' => 3,
                'offer_id' => 6,
                'saving' => 200,
                'expire_date' => '2022-5-31',
                'created_at' => '2020-4-01 00:00:00',
                'updated_at' => '2020-4-01 00:00:00',
                'code' => '27',
            ],
        ];
        UserOffer::insert($userOffers);
    }
}
