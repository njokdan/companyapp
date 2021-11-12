<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Company;
class DashboardController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
       // $this->middleware('role:ROLE_SUPERADMIN');
    }

    public function index(){

        return view('employees.dashboard');
    }
}
