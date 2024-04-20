<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                //1
                'id'=>1,
                'name' => "user",
            ],

            [
                //2
                'id'=>2,
                'name' => "merchants",

            ],

            [
                //3
                'id'=>3,
                'name' => "admin",

            ]
        ];
        Role::insert($roles);
    }
}
