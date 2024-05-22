<?php

namespace Modules\User\Http\Controllers\Api;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\User\Entities\Webcams;

class WebcamsApiController extends Controller
{
    public function index()
    {
        $webcams = Webcams::all();
        return response()->json($webcams);
    }
}
