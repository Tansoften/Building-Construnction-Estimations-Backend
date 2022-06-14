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
                "width"=> 500,
                "length"=> 500,
                "height"=> 500
        ]);

        //2
        Building::create([
            'user_id' => 1,
            "width"=> 500,
            "length"=> 500,
            "height"=> 500
        ]);
    }
}
