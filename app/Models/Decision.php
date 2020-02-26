<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Decision extends Model
{

    protected $table = 'decisions';
    public $timestamps = flase;

    public function sources()
    {
        return $this->belongsToMany('App\Models\Source');
    }

    public function scopeFindId($query, $id)
    {
        return $query->where('id', $id);
    }

}
