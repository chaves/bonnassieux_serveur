<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{

    protected $table = 'persons';
    public $timestamps = false;

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
