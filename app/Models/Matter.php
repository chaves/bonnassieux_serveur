<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Matter extends Model
{
    protected $fillable =
        [
            'name'
        ];

    public function sources()
    {
        return $this->belongsToMany('App\Models\Source');
    }

    public function scopeFindId($query, $id)
    {
        return $query->where('id', $id);
    }

}
