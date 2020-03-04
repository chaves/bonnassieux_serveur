<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Source extends Model
{

    protected $table = 'sources';
    public $timestamps = false;

    protected $fillable =
        [
            'date',
            'source',
            'validated'
        ];

    protected $casts = [
        'validated' => 'boolean',
    ];
    public function scopeFindId($query, $id)
    {
        return $query->where('id', $id);
    }

    public function cities()
    {
        return $this->belongsToMany('App\Models\City');
    }

    public function regions()
    {
        return $this->belongsToMany('App\Models\Region');
    }

    public function domains()
    {
        return $this->belongsToMany('App\Models\Domain');
    }

    public function persons()
    {
        return $this->belongsToMany('App\Models\Person');
    }

    public function groups()
    {
        return $this->belongsToMany('App\Models\Group');
    }

    public function matters()
    {
        return $this->belongsToMany('App\Models\Matter');
    }

}
