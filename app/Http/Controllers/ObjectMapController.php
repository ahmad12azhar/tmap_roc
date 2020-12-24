<?php

namespace App\Http\Controllers;

use App\Models\ObjectMap;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;


class ObjectMapController extends Controller
{
    protected $viewname;

    function __construct()
    {
        $this->viewname = 'Object';
        view()->share('viewname', $this->viewname);
        $this->middleware('permission:object-list');
        $this->middleware('permission:object-create', ['only' => ['create','store']]);
        $this->middleware('permission:object-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:object-delete', ['only' => ['destroy']]);
    }


    public function index(Request $request)
    {
        $data = ObjectMap::all();
        return view('pages.object.index', compact('data'));
    }

    public function form($id = false)
    {
        if ($id) {
            $data = ObjectMap::findOrFail($id);
            return view('pages.object.form', compact('data'));
        }
        $data = false;
        return view('pages.object.form', compact('data'));
    }

    public function show($id)
    {
        $data = ObjectMap::findOrFail($id);
        return view('pages.object.detail', compact('data'));
    }

    public function store(Request $request)
    {
        $data = new ObjectMap();
        $data->type = $request->type;
        $data->status = $request->status;
        if (!empty($request->file('image'))) {
            $data->path_image = $this->saveImage($request);
        }
        $data->save();

        if ($data) {
            Session::flash('success', 'Project was successfully added!');
            return redirect(route('object.index'));
        } else {
            Session::flash('failed', 'Failed to add project!');
            return back();
        }
    }

    public function update(Request $request, $id)
    {
        $data = ObjectMap::find($id);
        $data->type = $request->type;
        $data->status = $request->status;
        if (!empty($request->file('image'))) {
            $this->deleteImage($data);
            $data->path_image = $this->saveImage($request);
        }
        $data->save();

        if ($data) {
            Session::flash('success', 'Project was successfully added!');
            return redirect(route('object.index'));
        } else {
            Session::flash('failed', 'Failed to add project!');
            return back();
        }
    }

    public function destroy($id)
    {
        try {
            $data = ObjectMap::where('id', $id)->first();
            if ($data->delete()) {
                $this->deleteImage($data);
            }
            if ($data) {
                Session::flash('success', 'Item was successfully deleted!');
                return redirect(route('object.index'));
            }
            else {
                Session::flash('failed', 'Failed to delete item!');
                return back();
            }
        } catch (\Exception $e) {
            Session::flash('failed', 'This method is not allowed!');
            return back();
        }
    }

    private function saveImage(Request $request)
    {
        $file = $request->file('image');
        $filename = 'Icon_'.Str::random(6).'_'.$file->getClientOriginalName();
        Storage::disk('image_icon')->put($filename, file_get_contents($file));
        $pathname = 'uploads/icon' . '/' . $filename; 
        return $pathname;
    }

    private function deleteImage($data)
    {
        if (File::exists($data->path_image)) {
            File::delete($data->path_image);
        }
    }
}
