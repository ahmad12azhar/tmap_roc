<?php

namespace App\Http\Controllers;

use App\Models\DrawingMap;
use App\Models\ObjectMap;
use App\Models\ProjectMap;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ProjectController extends Controller
{
    protected $viewname;

    function __construct()
    {
        $this->viewname = 'Project';
        view()->share('viewname', $this->viewname);
    }

    public function index(Request $request)
    {
        $data['ProjectMap'] = new ProjectMap;
        $data['data'] = ProjectMap::all();
        return view('pages.project.index',$data);
    }

    public function form($id = false)
    {
        if ($id) {
            $data = ProjectMap::findOrFail($id);
            return view('pages.project.form', compact('data'));
        }
        $data = false;
        return view('pages.project.form', compact('data'));
    }

    public function show($id)
    {
        $data = ProjectMap::findOrFail($id);
        return view('pages.project.detail', compact('data'));
    }

    public function store(Request $request)
    {
        $data = new ProjectMap();
        $data->name = $request->name;
        $data->uplink = $request->uplink;
        $data->tematik_project = $request->tematik_project;
        $data->description = $request->description;
        $data->status = $request->status;
        if($request->status == "Complete") {
            $data->completed_at = Carbon::now();
        }
        $data->save();

        if ($data) {
            Session::flash('success', 'Project was successfully added!');
            return redirect(route('project.index'));
        } else {
            Session::flash('failed', 'Failed to add project!');
            return back();
        }
    }

    public function update(Request $request, $id)
    {
        $data = ProjectMap::find($id);
        $data->name = $request->name;
        $data->uplink = $request->uplink;
        $data->tematik_project = $request->tematik_project;
        $data->description = $request->description;
        $data->status = $request->status;
        if($request->status == "Complete") {
            $data->completed_at = Carbon::now();
        }
        $data->save();

        if ($data) {
            Session::flash('success', 'Project was successfully added!');
            return redirect(route('project.index'));
        } else {
            Session::flash('failed', 'Failed to add project!');
            return back();
        }
    }

    public function destroy($id)
    {
        try {
            $data = ProjectMap::where('id', $id)->first();
            $data->delete();
            if ($data) {
                Session::flash('success', 'Item was successfully deleted!');
                return redirect(route('project.index'));
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

    public function drawing($id)
    {
        $dataProject = ProjectMap::find($id);
        $object = ObjectMap::pluck('type', 'id');
        $objects = ObjectMap::all();
        return view('pages.project.map.drawing', compact('dataProject', 'object', 'objects'));
    }

    public function mapViewOnly($id)
    {
        $dataProject = ProjectMap::find($id);
        $object = ObjectMap::pluck('type', 'id');
        $objects = ObjectMap::all();
        return view('pages.project.map.map-view-only', compact('dataProject', 'object', 'objects'));
    }

}
