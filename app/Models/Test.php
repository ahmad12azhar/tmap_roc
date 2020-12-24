<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Grimzy\LaravelMysqlSpatial\Eloquent\SpatialTrait;

class Test extends Model
{
    use SpatialTrait;
    
    protected $table = 'test';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $guarded = [];

    protected $spatialFields = [
        'positions'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}