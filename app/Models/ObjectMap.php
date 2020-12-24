<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ObjectMap extends Model
{
    protected $table = 'object_map';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $guarded = [];
}