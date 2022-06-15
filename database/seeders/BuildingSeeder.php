<?php

namespace Database\Seeders;
use App\Models\Building;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BuildingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1
        Building::create([
                'user_id' => 1,
                "width"=> 4,
                "length"=> 5,
                "height"=> 5
        ]);

        //2
        Building::create([
            'user_id' => 1,
            "width"=> 5,
            "length"=> 5,
            "height"=> 5
        ]);
    }
}
