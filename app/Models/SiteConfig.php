<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteConfig extends Model
{
    protected $table = 'configuration';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $guarded = [];
}