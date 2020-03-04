<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Industry extends Model
{
    public $timestamps = false;
    protected $table = 'industries';
    protected $fillable =
        [
            'industry',
            'domain_id'
        ];

    public function domain()
    {
        return $this->belongsTo('App\Models\Domain');
    }

    public function sources()
    {
        return $this->belongsToMany('App\Models\Source');
    }

    public function scopeFindId($query, $id)
    {
        return $query->where('id', $id);
    }

    public function scopeFindDomain($query, $domain_id)
    {
        return $query->where('domain_id', $domain_id);
    }

}
