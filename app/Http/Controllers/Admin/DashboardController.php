<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
       // $this->middleware('role:ROLE_SUPERADMIN');
    }

    public function index(){
        return view('admin.dashboard');
    }
}
