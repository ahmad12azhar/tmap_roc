<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SiteConfig;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ConfigurationController extends Controller
{
    protected $viewname;

     function __construct()
    {
        $this->viewname = 'Site Configuration';
        view()->share('viewname', $this->viewname);
         $this->middleware('permission:configuration-form', ['only' => ['edit','update']]);
        // $this->middleware('permission:configuration-update', ['only' => ['destroy']]);
    }
    public function form()
    {
        $data = SiteConfig::first();
        if($data){
            return view('pages.configuration.form', compact('data'));
        }
        $data = false;
        return view('pages.configuration.form', compact('data'));
    }

    public function store(Request $request)
    {
        $data = SiteConfig::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'telephone' => $request->input('telephone'),
            'address' => $request->input('address'),
            'site_title' => $request->input('site_title'),
            'site_tagline' => $request->input('site_tagline'),
            'site_description' => $request->input('site_description'),
             'facebook' => $request->input('facebook'),
            'twitter' => $request->input('twitter'),
            'instagram' => $request->input('instagram'),
            'logo_path' => $this->saveImage($request)
        ]);

        if ($data) {
            Session::flash('success', 'Configuration was successfully added!');
            return redirect(route('mljpanel.configuration.form'));
        }
        else {
            Session::flash('failed', 'Failed to add configuration!');
            return back();
        }
    }

    public function update(Request $request, $id)
    {
        $data = SiteConfig::findOrFail($id);
        $data->email = $request->email;
        $data->telephone = $request->telephone;
        $data->address = $request->address;
         $data->site_title = $request->site_title;
        $data->site_tagline = $request->site_tagline;
        $data->site_description = $request->site_description;
         $data->twitter = $request->twitter;
        $data->instagram = $request->instagram;

        if (!empty($request->file('image'))) {
            $this->deleteImage($data);
            $data->logo_path = $this->saveImage($request);
        }
        $data->save();

        if ($data) {
            Session::flash('success', 'Ntabb berhasil update');
            return redirect(route('mljpanel.configuration.form'));
        }
        else {
            Session::flash('failed', 'Loalaah gagal update');
            return back();
        }
    }

    private function saveImage(Request $request)
    {
        $file = $request->file('image');
        $filename = date('YmdHis') . '_' . $file->getClientOriginalName();
        Storage::disk('image_config')->put($filename, file_get_contents($file));
        $pathname = 'uploads/config' . '/' . $filename; 
        return $pathname;
    }

    private function deleteImage($data)
    {
        if (File::exists($data->logo_path)) {
            File::delete($data->logo_path);
        }
    }
}
