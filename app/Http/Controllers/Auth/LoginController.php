<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo;// = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    // }

    public function __construct()
    {
        if(Auth::check() && Auth::user()->role_id == 1){
           // return redirect('/superadmin/dashboard');
            $this->redirectTo = RouteServiceProvider::SUPERADMIN;//route('superadmin.dashboard');
            //return $this->redirect()->route('superadmin.dashboard');
        } 
        elseif(Auth::check() && Auth::user()->role_id == 2){
            //return redirect('/admin/dashboard');
            $this->redirectTo = RouteServiceProvider::ADMIN;//route('admin.dashboard');
            //return $this->redirect()->route('admin.dashboard');
        }
        elseif(Auth::check() && Auth::user()->role_id == 3){
            $this->redirectTo = RouteServiceProvider::COMPANY;//route('company.dashboard');
           // return redirect('/company/dashboard');
            //return $this->redirect()->route('company.dashboard');
        }
        elseif(Auth::check() && Auth::user()->role_id == 4){
            $this->redirectTo = RouteServiceProvider::EMPLOYEE;//route('employee.dashboard');
            //return redirect('/employee/dashboard');
            //return $this->redirect()->route('employee.dashboard');
        }
       
        $this->middleware('guest')->except('logout');
    }
}
