<?php

namespace Database\Seeders;
use App\Models\Window;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WindowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
                //1
                Window::create([
                    "building_id" => 1,
                    "width"=> 1,
                    "length"=> 1,
                    "count" => 2
                ]);

    }
}
