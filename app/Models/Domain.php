<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    protected $fillable =
        [
            'domain',
            'description'
        ];

    public function industries()
    {
        return $this->hasMany('App\Models\Industry');
    }

    public function sources()
    {
        return $this->belongsToMany('App\Models\Source');
    }

    public function scopeFindId($query, $id)
    {
        return $query->where('id', $id);
    }

}
