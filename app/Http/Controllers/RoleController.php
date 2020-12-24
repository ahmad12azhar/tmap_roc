<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    protected $viewname;

    function __construct()
    {
        $this->viewname = 'Role';
        view()->share('viewname', $this->viewname);
        $this->middleware('permission:role-list');
        $this->middleware('permission:role-create', ['only' => ['create','store']]);
        $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $data = Role::all();
        return view('pages.role.index', compact('data'));

    }

    public function form($id = false)
    {
        $permission = Permission::get();
        if($id){
            $data = Role::findOrFail($id);
            $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();

            return view('pages.role.form', compact('data', 'permission', 'rolePermissions'));
        }
        $data = false;
        $rolePermissions = false;
        return view('pages.role.form', compact('data', 'permission', 'rolePermissions'));
    }

    public function store(Request $request)
    {
        $data = Role::create(['name' => $request->input('name')]);
        $data->syncPermissions($request->input('permission'));

        if ($data) {
            Session::flash('success', 'Role was successfully added!');
            return redirect(route('role.index'));
        }
        else {
            Session::flash('failed', 'Failed to add customer!');
            return back();
        }
    }

    public function update(Request $request, $id)
    {
        $data = Role::findOrFail($id);
        $data->name = $request->name;
        $data->save();

        $data->syncPermissions($request->input('permission'));

        if ($data) {
            Session::flash('success', 'Role was successfully updated!');
            return redirect(route('role.index'));
        }
        else {
            Session::flash('failed', 'Failed to update role!');
            return back();
        }
    }

    public function destroy($id)
    {
        try {
            $data = Role::where('id', $id)->first();
            $data->delete();
            if ($data) {
                Session::flash('success', 'Role was successfully deleted!');
                return redirect(route('role.index'));
            }
            else {
                Session::flash('failed', 'Failed to delete role!');
                return back();
            }
        } catch (\Exception $e) {
            Session::flash('failed', 'This method is not allowed!');
            return back();
        }
    }
}
