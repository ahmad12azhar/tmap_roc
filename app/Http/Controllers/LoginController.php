<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Jobs\SendEmailForgotPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use App\Jobs\SendEmailRegister;


class LoginController extends Controller
{
    public function login()
    {
        if (Auth::guard('web')->check())
            return redirect(url('/'));
        else
            return view('auth.login');
    }

    public function postLogin(Request $request)
    {
        $input = $request->all();
        if (Auth::attempt(['nid' => $input['nid'], 'password' => $input['password']])) {
            return redirect(url('/'));
        } else {
            return back()->withInput()->withErrors(['message' => 'Please check your credentials and try again.']);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function getRegister()
    {
        return view('auth.sign_up');
    }

    public function postRegister(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|max:255',
            'hp' => 'required|min:6|unique:users|max:30'
        ]);

        $data = new User();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->hp = $request->hp;
        $data->kd_aktivasi = Str::random(8);
        $data->password = bcrypt($request->password);
        $data->save();

        dispatch(new SendEmailRegister($data, $request->password));

        if ($data) {
            // Session::flash('success', 'User was successfully added!');
            $messageType = 1;
            $message = "Terima kasih, pendaftaran berhasil. silahkan cek email anda";
            return back()->with('messageType', $messageType)->with('message', $message);
            return redirect(route('login'));
        } else {
            Session::flash('failed', 'Failed to add user!');
            return back();
        }
    }

    public function getForgotPassword()
    {
        return view('auth.forgot_password');
    }

    public function postForgotPassword(Request $request)
    {

        $data = User::where('email', $request->email)->first();
        if($data) {
            $data->reset_code = Str::random(8);
            $data->save();

            dispatch(new SendEmailForgotPassword($data));
            return redirect(route('login'));

        } else {
            return back()->withInput()->withErrors(['message' => 'Your email has not been registered']);
        }
    }

    public function getRecoveryPassword($code)
    {
        $data = User::where('reset_code', $code)->first();
        if($data) {
            return view('auth.recovery_password', compact('data'));
        } else {
            return view('pages.error_404');
        }
    }

    public function postRecoveryPassword(Request $request)
    {
        $this->validate($request, [
            'password' => 'required|min:6|required_with:password_confirmation|confirmed'
        ]);

        $data = User::find($request->id);
        $data->password = bcrypt($request->password);
        $data->save();
        return redirect(route('login'));
    }
}
