<?php

namespace App\Http\Controllers;

use App\Models\DrawingMap;
use App\Models\MapPoint;
use App\Models\ObjectMap;
use App\Models\ProjectMap;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class DrawingMapController extends Controller
{
    protected $viewname;

    function __construct()
    {
        $this->viewname = 'Drawing Map';
        view()->share('viewname', $this->viewname);
        $this->middleware('permission:drawing-list');
        $this->middleware('permission:drawing-create', ['only' => ['create','store']]);
        $this->middleware('permission:drawing-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:drawing-delete', ['only' => ['destroy']]);
    }

    public function index($id_project)
    {
        $data = DrawingMap::with('object')->where('project_id', $id_project)->get();
        $project = ProjectMap::find($id_project);
        return view('pages.drawing.index', compact('data', 'project'));
    }

    public function form($id_project, $id = false)
    {
        $project = ProjectMap::find($id_project);
        $object = ObjectMap::pluck('type', 'id');
        if ($id) {
            $data = DrawingMap::findOrFail($id);
            return view('pages.drawing.form', compact('data', 'project', 'object'));
        }
        $data = false;
        return view('pages.drawing.form', compact('data', 'project', 'object'));
    }

    public function show($id_project, $id)
    {
        $project = ProjectMap::find($id_project);
        $data = DrawingMap::findOrFail($id);
        return view('pages.drawing.detail', compact('data', 'project'));
    }

    public function store(Request $request, $id_project)
    {
        $data = new DrawingMap();
        $data->name = $request->name;
        $data->type_object = $request->type_object;
        $data->coordinates = $request->coordinates;
        $data->user_id = Auth::user()->id;;
        $data->project_id = $request->project_id;
        $data->save();

        if ($data) {
            Session::flash('success', 'Project was successfully added!');
            return redirect(route('drawing.index'));
        } else {
            Session::flash('failed', 'Failed to add project!');
            return back();
        }
    }

    public function update(Request $request, $id_project, $id)
    {
        $data = DrawingMap::find($id);
        $data->name = $request->name;
        $data->user_id = Auth::user()->id;
        $data->object_id = $request->object_id;
        $data->used = $request->used;
        $data->occ = $request->occ;
        $data->capacity = $request->capacity;
        $data->status = $request->status;
        $data->description = $request->description;
        $data->save();

        if ($data) {
            Session::flash('success', 'Project was successfully added!');
            return redirect(route('drawing.index', $id_project));
        } else {
            Session::flash('failed', 'Failed to add project!');
            return back();
        }
    }

    public function destroy($id_project, $id)
    {
        try {
            $data = DrawingMap::where('id', $id)->first();
            if ($data->delete()) {
            }
            if ($data) {
                Session::flash('success', 'Item was successfully deleted!');
                return redirect(route('drawing.index'));
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
    
    public function getMarker(Request $request) {
        $data = DrawingMap::with('object')->where('project_id', $request->project_id)->where('type_object', "Marker")->get();
        $response = [
            'status'    => 'success',
            'message'   => 'Get data success!',
            'data'      => $data
        ];
        return response()->json($response, 200);
    }

    public function getPublicMarker(Request $request) {
        $data = MapPoint::with('object')->get();
        $response = [
            'status'    => 'success',
            'message'   => 'Get data success!',
            'data'      => $data
        ];
        return response()->json($response, 200);
    }

    public function getPolyline(Request $request) {
        $data = DrawingMap::where('project_id', $request->project_id)->where('type_object', "Polyline")->get();
        $response = [
            'status'    => 'success',
            'message'   => 'Get data success!',
            'data'      => $data
        ];
        return response()->json($response, 200);
    }

    public function getPolygon(Request $request) {
        $data = DrawingMap::where('project_id', $request->project_id)->where('type_object', "Polygon")->get();
        $response = [
            'status'    => 'success',
            'message'   => 'Get data success!',
            'data'      => $data
        ];
        return response()->json($response, 200);
    }

    public function deleteShape(Request $request) {
        $data = DrawingMap::where('unique_id', $request->unique_id)->first();
        $data->delete();
        $response = [
            'status'    => 'success',
            'message'   => 'Delete data success!',
            'data'      => $data
        ];
        return response()->json($response, 200);
    }
    
    public function updateShape(Request $request) {
        $data = DrawingMap::where('unique_id', $request->unique_id)->first();
        if($data) {
            if($request->name) $data->name = $request->name;
            if($request->used) $data->used = $request->used;
            if($request->occ) $data->occ = $request->occ;
            if($request->capacity) $data->capacity = $request->capacity;
            if($request->status) $data->status = $request->status;
            if($request->description) $data->description = $request->description;
            if($request->object_id) $data->object_id = $request->object_id;
            
            $data->save();    
            $message = 'Update name object success';
        } else {
            $message = 'Object not found!';
        }
        $response = [
            'status'    => 'success',
            'message'   => $message,
            'data'      => $data
        ];
        return response()->json($response, 200);
    }

    public function drawingMap(Request $request)
    {
        $data = DrawingMap::where('unique_id', $request->unique_id)->first();
        if($data == null) {
            $data = new DrawingMap();
        }
        $data->name = $request->name;
        $data->type_object = $request->type_object;
        $data->user_id = Auth::user()->id;
        $data->project_id = $request->project_id;
        $data->unique_id = $request->unique_id;
        $data->length_of_line = $request->length;
        $data->coordinates = json_encode($request->coordinates);
        $data->save();

        $response = [
            'status'    => 'success',
            'message'   => 'Save object map success!',
            'data'      => $data
        ];
        return response()->json($response, 200);
    }
}
