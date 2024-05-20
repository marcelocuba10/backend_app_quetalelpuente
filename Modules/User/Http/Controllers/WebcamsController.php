<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\User\Entities\Webcams;

class WebcamsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web', ['except' => ['logout']]);

        $this->middleware('permission:webcam-list|webcam-create|webcam-edit|webcam-delete', ['only' => ['index']]);
        $this->middleware('permission:webcam-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:webcam-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:webcam-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $webcams = DB::table('webcams')
            ->select(
                'id',
                'title',
                'url',
                'type',
                'status'
            )
            ->orderBy('created_at', 'DESC')
            ->paginate(10);

        return view('user::webcams.index', compact('webcams'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    public function create()
    {
        $status = array(
            array('1', 'Habilitado'),
            array('0', 'Deshabilitado'),
        );

        $types = array(
            array('1', 'M3u8'),
            array('0', 'Iframe'),
        );

        $webcamType = null;
        $webcamStatus = null;

        return view('user::webcams.create', compact('webcamType', 'webcamStatus', 'status', 'types'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:200|min:5|unique:webcams,title',
            'url' => 'required|string|max:2000|min:10',
            'type' => 'required',
            'provider' => 'nullable|string|max:200|min:5',
        ], [
            'title.unique' => 'Ya existe un registro con ese nombre',
        ]);

        $input = $request->all();
        Webcams::create($input);

        return redirect()->to('/user/webcams')->with('message', 'Registro creado correctamente');
    }

    public function show($id)
    {
        $webcam = DB::table('webcams')
            ->select(
                'id',
                'title',
                'url',
                'type',
                'provider',
                'status'
            )
            ->where('id', '=', $id)
            ->first();

        $status = array(
            array('1', 'Habilitado'),
            array('0', 'Deshabilitado'),
        );

        $webcamType = null;
        $webcamStatus = null;

        return view('user::webcams.show', compact('webcam', 'webcamType', 'webcamStatus', 'status'));
    }

    public function edit($id)
    {
        $webcam = DB::table('webcams')
            ->select(
                'id',
                'title',
                'url',
                'type',
                'provider',
                'status'
            )
            ->where('id', '=', $id)
            ->first();

        $status = array(
            array('1', 'Habilitado'),
            array('0', 'Deshabilitado'),
        );

        $webcamType = $webcam->type;
        $webcamStatus = $webcam->status;

        return view('user::webcams.edit', compact('webcam', 'webcamType', 'webcamStatus', 'status'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:200|min:5|unique:webcams,title,' . $id,
            'url' => 'required|string|max:2000|min:10',
            'type' => 'required',
            'provider' => 'nullable|string|max:200|min:5',
        ], [
            'title.unique' => 'Ya existe un registro con ese nombre',
        ]);

        $input = $request->all();
        $webcam = Webcams::find($id);
        $webcam->update($input);

        return redirect()->to('/user/webcams')->with('message', 'Registro actualizado correctamente');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        if ($search == '') {
            $webcams = DB::table('webcams')
                ->select(
                    'id',
                    'title',
                    'url',
                    'type',
                    'provider',
                    'status'
                )
                ->paginate(10);
        } else {
            $webcams = DB::table('webcams')
                ->select(
                    'id',
                    'title',
                    'url',
                    'type',
                    'provider',
                    'status'
                )
                ->where('title', 'LIKE', "%{$search}%")
                ->paginate();
        }

        return view('user::webcams.index', compact('webcams', 'search'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    public function destroy($id)
    {
        Webcams::find($id)->delete();
        return redirect()->to('/user/webcams')->with('message', 'Registro eliminado correctamente');
    }
}
