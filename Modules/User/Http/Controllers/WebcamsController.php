<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WebcamsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web', ['except' => ['logout']]);

        $this->middleware('permission:webcams-list|webcams-create|webcams-edit|webcams-delete', ['only' => ['index']]);
        $this->middleware('permission:webcams-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:webcams-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:webcams-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $idRefCurrentUser = Auth::user()->idReference;
        $webcams = DB::table('webcams')
            ->where('status', '=', 1)
            ->select('id', 'title', 'url', 'type', 'status')
            ->orderBy('create_at', 'DESC')
            ->paginate(20);

        return view('user::webcams.index', compact('webcams'))->with('i', (request()->input('page', 1) - 1) * 20);
    }
}
