<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoofingMaterial extends Model
{
    use HasFactory;
    protected $fillable =[
        'building_id',
        'woods',
        'papies',
        'sheets'
    ];
}
