<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Auth;
use Validator;

class UserController extends Controller
{
    protected $viewname, $auth_user;

    function __construct()
    {
        $this->viewname = 'User';
        view()->share('viewname', $this->viewname);
    }
    
    public function index(Request $request)
    {
        $data = User::all();
        return view('pages.user.index', compact('data'));
    }

    public function getAccount ()
{
    $data = User::find(Auth::user()->id);
     return view('pages.myaccount', compact('data'));
  }


    public function form($id = false)
    {
        $role = Role::pluck('name', 'id');
        if($id){
            $data = User::findOrFail($id);
            $userRole = $data->roles->first();
            return view('pages.user.form', compact('data', 'role' ));
        }
        $data = false;
        $userRole = false;
        return view('pages.user.form', compact('data', 'role'));
    }

    public function show($id)
    {
        $data = User::findOrFail($id);
        return view('pages.user.detail', compact('data'));
    }
 
    public function store(Request $request)
    {
         $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|max:255',
             'nid' => 'required|min:6|unique:users|max:30'
        ]);
          if ($validator->fails()) {
            $messageType = 2;
            $message = "Mohon Periksa kembali inputan anda";
            return back()->with('messageType', $messageType)->with('message', $message);
        }

        $data = new User();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->status = $request->status;
        $data->nid = $request->nid;
        $data->password = bcrypt($request->password);
        $data->save(); 
        $data->assignRole($request->input('role_id'));

        if ($data) {
            Session::flash('success', 'User was successfully added!');
            return redirect(route('user.index'));
        }
        else {
            Session::flash('failed', 'Failed to add user!');
            return back();
        }
    }

    public function update(Request $request, $id)
    {
        $data = User::findOrFail($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->nid = $request->nid;
         $data->save();

        DB::table('model_has_roles')->where('model_id',$id)->delete();
        $data->assignRole($request->input('role_id'));

        if ($data) {
            $messageType = 1;
            $message = "Akun berhasil di update";
             return back()->with('messageType', $messageType)->with('message', $message);
        }
        else {
            Session::flash('failed', 'Failed to update user!');
            return back();
        }
    }

     public function disable(Request $request, $id)
    {
        $data = User::findOrFail($id);
        $data->status = $request->status; 
         $data->save();

        DB::table('model_has_roles')->where('model_id',$id)->delete();
        $data->assignRole($request->input('role_id'));

        if ($data) {
            $messageType = 1;
            $message = "Disable Akun berhasil";
             return back()->with('messageType', $messageType)->with('message', $message);
        }
        else {
            Session::flash('failed', 'Failed to update user!');
            return back();
        }
    }

    public function destroy($id)
    {
        try {
            $data = User::where('id', $id)->delete();
            DB::table('model_has_roles')->where('model_id',$id)->delete();
            if ($data) {
                Session::flash('success', 'User was successfully deleted!');
                return redirect(route('user.index'));
            }
            else {
                Session::flash('failed', 'Failed to delete user!');
                return back();
            }
        } catch (\Exception $e) {
            Session::flash('failed', 'This method is not allowed!');
            return back();
        }       
    }

    public function editPassword($id)
    {
        $data = User::findOrFail($id);
        return view('pages.user.editpassword', compact('data'));
    }

    public function updatePassword(Request $request, $id)
    {
        $data = User::findOrFail($id);
        $data->password = bcrypt($request->password);
        $data->save();

        if ($data) {
            Session::flash('success', 'Password was successfully updated!');
            return redirect(route('user.index'));
        }
        else {
            Session::flash('failed', 'Failed to update password!');
            return back();
        }
    }
}
