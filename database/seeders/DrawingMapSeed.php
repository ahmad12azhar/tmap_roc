<?php

namespace Database\Seeders;

use App\Models\DrawingMap;
use App\Models\ObjectMap;
use Illuminate\Database\Seeder;

class DrawingMapSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $obj = ObjectMap::first();
        DrawingMap::create([
            'name' => 'name', 
            'type_object' => 'Marker', 
            'coordinates' => '[
                "33.536357198629936",
                "-111.95329461711009"
            ]', 
            'unique_id' => 1606877877192,
            'user_id' => 1,
            'project_id' => 1,
            'object_id' => $obj->id
        ]);

    }
}
