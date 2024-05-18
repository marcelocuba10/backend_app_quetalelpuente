<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web', ['except' => ['logout']]);
    }

    public function index()
    {
        $idRefCurrentUser = Auth::user()->idReference;

        $cant_customers = 10;

        $cant_users = 10;

        $cant_machines = 10;

        return view('user::dashboard', compact('cant_customers', 'cant_users', 'cant_machines'));
    }
}
