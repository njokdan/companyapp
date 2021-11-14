<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Auth;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo;// = RouteServiceProvider::HOME;

    public function __construct()
    {
        // if(Auth::check() && Auth::user()->role_id == 1){
        //     $this->redirectTo = route('superadmin.dashboard');
        // } 
        // elseif(Auth::check() && Auth::user()->role_id == 2){
        //     $this->redirectTo = route('admin.dashboard');
        // }
        // elseif(Auth::check() && Auth::user()->role_id == 3){
        //     $this->redirectTo = route('company.dashboard');
        // }
        // elseif(Auth::check() && Auth::user()->role_id == 4){
        //     $this->redirectTo = route('employee.dashboard');
        // }
       
        // $this->middleware('guest')->except('logout');

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
