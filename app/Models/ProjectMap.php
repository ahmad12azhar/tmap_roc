<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProjectMap extends Model
{
    protected $table = 'project_map';
    protected $guarded = [];
    protected $primaryKey = 'id';
	
	public function get_cpp($id)
	{
		$query = DB::table('project')
			->where('project_id', $id)
			->get();
			
		foreach($query as $p){
			return $p->capex;
		}		
	}
}

