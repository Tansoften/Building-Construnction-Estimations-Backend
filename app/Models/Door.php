<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Door extends Model
{
    use HasFactory;
    protected $fillable = [
        'building_id',
        'width',
        'length',
        'count'
    ];
    public function building(){
        return $this->belongsTo(Building::class, 'building_id', 'id');
    }
}
