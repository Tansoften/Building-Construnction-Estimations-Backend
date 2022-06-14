<?php

namespace Database\Seeders;
use App\Models\Door;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DoorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1
        Door::create([
            "building_id" => 1,
            "width"=> 20,
            "length"=> 50,
            "count" => 1
        ]);
        //2
        Door::create([
            "building_id" => 2,
            "width"=> 20,
            "length"=> 40,
            "count" => 1
        ]);
    }
}
