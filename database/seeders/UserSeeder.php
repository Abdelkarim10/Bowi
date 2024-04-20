<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                //1
                'name' => "Admin",
                'email' => 'admin@vagary.tech',
                'password' => bcrypt("password"),
                'gender' => 'Male',

                'age' => 20,
                'country_id' => 2,
                'region' =>'north',
                'city' =>'tripoli',
                'address' =>'beb el ramel',
                'zipcode' => 1200,
                
                'country_code' => '+961',
                'phone_number' => "7678874523",
                'profile_pic' => null,
                'role_id' => 3,
                'fcm_token' => null,
                'plan_id' => 1,
                'plan_expiry_date' => '2021-08-22 18:56:06',
                'activated' => true,

                'created_at' => '2020-08-22 18:56:06',

            ],

            [
                //2
                'name' => "Admin1",
                'email' => 'admin1@vagary.tech',
                'password' => bcrypt("password1"),
                'gender' => 'Female',
                
                'age' => 20,
                'country_id' => 1,
                'region' =>'north',
                'city' =>'tripoli',
                'address' =>'beb el ramel',
                'zipcode' => 1200,

                'country_code' => '+961',
                'phone_number' => "9678874532",
                'profile_pic' => null,
                'role_id' => 2,
                'fcm_token' => null,
                'plan_id' => 2,
                'plan_expiry_date' => '2023-08-22 18:56:06',
                'activated' => false,

                'created_at' => '2020-08-22 18:56:06',
            ],

            [
                //3
                'name' => "user",
                'email' => 'user@vagary.tech',
                'password' => bcrypt("password1"),
                'gender' => 'Female',
                
                'age' => 20,
                'country_id' => 1,
                'region' =>'north',
                'city' =>'tripoli',
                'address' =>'beb el ramel',
                'zipcode' => 1200,

                'country_code' => '+961',
                'phone_number' => "78874532",
                'profile_pic' => null,
                'role_id' => 1,
                'fcm_token' => null,
                'plan_id' => 2,
                'plan_expiry_date' => '2023-08-22 18:56:06',
                'activated' => false,

                'created_at' => '2021-08-22 18:56:06',
            ]
        ];
        User::insert($users);
    }
}
