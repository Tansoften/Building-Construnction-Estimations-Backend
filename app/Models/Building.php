<?php

namespace App\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BuildingMaterial;
use App\Models\RoofingMaterial;
class Building extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'width',
        'height',
        'length'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function doors(){
        return $this->hasMany(Door::class, 'building_id');
    }

    public function windows(){
        return $this->hasMany(Window::class, 'building_id');
    }
    public function building_materials(){
        return $this->hasOne(BuildingMaterial::class,'building_id','id');
    }
    public function roofing_materials(){
        return $this->hasOne(RoofingMaterial::class,'building_id','id');
    }
}
