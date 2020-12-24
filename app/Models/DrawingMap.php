<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DrawingMap extends Model
{
    protected $table = 'drawing_map';
    protected $guarded = [];
    protected $primaryKey = 'id';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function object()
    {
        return $this->belongsTo(ObjectMap::class);
    }

    public function project()
    {
        return $this->belongsTo(ProjectMap::class);
    }
}

