<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\MapPoint;
use Validator;
use App\Models\BulkImport;
use Maatwebsite\Excel\Facades\Excel;

class BulkController extends Controller
{
    protected $viewname;

        protected $fillable = ['nama','nis','alamat'];
    function __construct()
    {
        $this->viewname = 'Bulk Map Data';
        view()->share('viewname', $this->viewname);
    } 

    public function index(Request $request)
    {
         $data = MapPoint::all();
         return view('pages.bulk.index',compact('data') );
    }

    public function form($id = false)
    {

        return view('pages.bulk.form' );
    }

    public function uploadCSV(Request $request)
{
     

   if ($request->hasFile('file')) {
  
              Excel::import(new BulkImport,request()->file('file')); 
              $messageType = 2;
            $message = "Import Data Berhasil !";
                      return back()->with('messageType', $messageType)->with('message', $message);
   } 
   
   else {
     $messageType = 2;
            $message = "Import Data Gagal !";
     return back()->with('messageType', $messageType)->with('message', $message);
   }
}

    public function store(Request $request)
    {
        $data = Permission::create(['name' => $request->input('name')]);

        if ($data) {
            Session::flash('success', 'Permission was successfully added!');
            return redirect(route('bulk.index'));
        }
        else {
            Session::flash('failed', 'Failed to add customer!');
            return back();
        }
    }

    public function update(Request $request, $id)
    {
        
    }

    public function destroy($id)
    {
         
    }
}
