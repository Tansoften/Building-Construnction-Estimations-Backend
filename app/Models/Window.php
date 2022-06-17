<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Window extends Model
{
    use HasFactory;
    protected $fillable=[
        'building_id',
        'width',
        'length',
        'count'
    ];
    public function building(){
        return $this->belongsTo(Building::class, 'building_id', 'id');
    }
    public function user(){
        return $this->belongsTo(User::class, 'buildings','user_id');
    }
}
