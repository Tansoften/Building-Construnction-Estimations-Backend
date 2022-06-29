<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuildingMaterial extends Model
{
    use HasFactory;
    protected $fillable =[
        'building_id',
        'blocks',
        'cement_bags',
        'sand_buckets'
    ];

}
