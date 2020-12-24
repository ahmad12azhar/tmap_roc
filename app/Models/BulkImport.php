<?php

namespace App\Models;

use App\Models\MapPoint;
use Maatwebsite\Excel\Concerns\ToModel;

class BulkImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

         return new MapPoint([
            'name' => $row[0],
            'lat' => $row[2], 
            'lang' => $row[3], 
             'type' => $row[1], 
             'capacity' => $row[4],
             'used' => $row[5], 
             'occ' => $row[6],
             'status' => $row[7]
        ]);
    }
}