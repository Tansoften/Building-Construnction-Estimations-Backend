<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(
            [//1
                "first_name"=> "Oscar",
                "last_name"=> "Humbe",
                "gender"=> "M",
                "phone"=> "0786582392",
                "email"=> "oscar@gmail.com",
                "password"=> Hash::make('123456'),             
                
            ]);

            User::create(
                [//2
                    "first_name"=> "Beni",
                    "last_name"=> "John",
                    "gender"=> "M",
                    "phone"=> "0753177579",
                    "email"=> "beni@gmail.com",
                    "password"=> Hash::make('123456'),             
                    
                ]);
    }
}
