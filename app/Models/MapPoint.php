<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MapPoint extends Model
{
    protected $table = 'ms_object';
    protected $guarded = ['id'];
    public $timestamps = false;

    public function object()
    {
  		return $this->belongsTo('App\Models\ObjectMap','type','type');
    }
}

