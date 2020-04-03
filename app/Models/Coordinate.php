<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coordinate extends Model
{

    protected $table = 'coordinates';
    public $timestamps = false;

    public function scopeFindCityId($query, $id)
    {
        return $query->where('city_id', $id);
    }

}
