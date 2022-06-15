<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\Building;
class EstimationController extends Controller
{
    private $block_height = 23;
    private $block_thickness = 15;
    private $block_length = 45;
    
    public function estimate($buildingId){
        $building = Building::find($buildingId);
        if(!$building){
            return response()->json([
                "message" => "Building does not exist."
            ],404);
        }
        if(!Gate::check('isUser', $building->user)){
            return response()->json([
                'message' => "You can't perform this action."
            ],403);
        }
        $width  = $building->width * 100;
        $length  = $building->length * 100;
        $height  = $building->height * 100;

        $blocks_without_doors_windows = (($this->wall_height_blocks($height)  + $this->wall_width_blocks($width)) * $this->wall_length_blocks($length)) *2;
        $base_blocks = $this->get_base_blocks($building);
        $doors_blocks = $this->get_doors_blocks($building);
        $windows_blocks = $this->get_windows_blocks($building); 
        $blocks = $blocks_without_doors_windows - $doors_blocks - $windows_blocks; 
        $cement_bags = $this->cement_bags($blocks, "building") + $this->cement_bags($base_blocks, "base");
        $sand_backets = $cement_bags *18;
        $blocks += $base_blocks; 
        return response()->json([
            "message" => "Estimation retrived successfully",
            'body' => [
                'blocks' => $blocks,
                'cement_bags' => $cement_bags,
                'sand_buckets' => $sand_backets
            ]
        ],200);
    }

    //Calculating number of blocks in height
    private function wall_height_blocks($height){
        return ceil($height/$this->block_height);
    }
    //Calculating number of block in length
    private function wall_length_blocks($length){
        return ceil($length/$this->block_length);
    }

    //Calculating number of block in width
    private function wall_width_blocks($width){
        return ceil($width/$this->block_length);
    }

    //Calculating blocks replaced by doors
    private function get_doors_blocks($building){
        $width = 0;
        $length = 0;
        $doors = $building->doors;
        if(!$doors->isEmpty())
            foreach($doors as $door){
                $width += ($door->width * $door->count);
                $length += ($door->length * $door->count);
                
            }
            $length *= 100;
            $width *= 100;
        $blocks = ceil($this->wall_width_blocks($width) * $this->wall_height_blocks($length));
        return $blocks;
    }

        //Calculating blocks replaced by windows
        private function get_windows_blocks($building){
            $width = 0;
            $length = 0;
            $windows = $building->windows;
            if(!$windows->isEmpty())
                foreach($windows as $window){
                    $width += ($window->width * $window->count);
                    $length += ($window->length * $window->count);
                    
                }
                $length *= 100;
                $width *= 100;
            $blocks = ceil($this->wall_width_blocks($width) * $this->wall_height_blocks($length));
            return $blocks;
        }

        //Calculate base blocks
        private function get_base_blocks($building){
            $width = $building->width*100;
            $length = $building->length *100;
            $height = $building->height *100;
            $blocks = 3 *(ceil($width/$this->block_length) + ceil($length/$this->block_length)) *2;
            return $blocks;
        }

        //Calculate cement bags 
        private function cement_bags($blocks, $type){ 
            if($type == "base"){
                return ceil($blocks/45);
            }
            else{
                return ceil($blocks/60);
            }
        }
}
