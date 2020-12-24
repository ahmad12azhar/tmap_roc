<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    protected $viewname;

   function __construct()
    {
        $this->viewname = 'Permission';
        view()->share('viewname', $this->viewname);
        $this->middleware('permission:permission-list');
        $this->middleware('permission:permission-create', ['only' => ['create','store']]);
        $this->middleware('permission:permission-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:permission-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
         $data = Permission::get();
            return view('pages.permission.index', compact('data'));

    }

    public function form($id = false)
    {
        if($id){
            $data = Permission::findOrFail($id);
            return view('pages.permission.form', compact('data'));
        }
        $data = false;
        return view('pages.permission.form', compact('data'));
    }

    public function store(Request $request)
    {
        $data = Permission::create(['name' => $request->input('name')]);

        if ($data) {
            Session::flash('success', 'Permission was successfully added!');
            return redirect(route('permission.index'));
        }
        else {
            Session::flash('failed', 'Failed to add customer!');
            return back();
        }
    }

    public function update(Request $request, $id)
    {
        $data = Permission::findOrFail($id);
        $data->name = $request->name;
        $data->save();

 
        if ($data) {
            Session::flash('success', 'Permission was successfully updated!');
            return redirect(route('permission.index'));
        }
        else {
            Session::flash('failed', 'Failed to update permission!');
            return back();
        }
    }

     public function destroy($id)
    {
        try {
            $data = Permission::where('id', $id)->first();
            $data->delete();
            if ($data) {
                Session::flash('success', 'Permission was successfully deleted!');
                return redirect(route('permission.index'));
            }
            else {
                Session::flash('failed', 'Failed to delete Permission!');
                return back();
            }
        } catch (\Exception $e) {
            Session::flash('failed', 'This method is not allowed!');
            return back();
        }
    }
}
