<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Company;
use Auth;

use DB;//direct mysql

class EmployeesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth',['except' => ['index']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$companies =  Company::orderBy('created_at','asc');
        
        $users = User::orderBy('created_at','desc')->paginate(3);
        
        if(Auth::user()->role_id == "1"){
            return view('employee.dashboard', ['users' => $users]);
        }elseif(Auth::user()->role_id == "2"){
            return view('employee.dashboard', ['users' => $users]);
        }
        elseif(Auth::user()->role_id == "3"){
            return view('employee.dashboard', ['users' => $users]);
        }        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles = Role::pluck('role_name', 'role_id');
        $companies = Company::pluck('name', 'id');
        // return view('employees.create');
        return view('employees.create', ['companies' => $companies, 'roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
       // dd($request->all());//('title'));
        //dd($request.body);

        $this->validate($request, [
            'role_id' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'company_id' => 'required',
            'email' => 'required',
            'phone' => 'required',
            // 'cover_image' => 'image|nullable|max:1999'
        ]);

        //return 123;
        $user = new User();
        //$user = User::find($id);
        $user->role_id = $request->input('role_id');
        $user->firstname = $request->input('firstname');
        $user->lastname = $request->input('lastname');
        $user->company_id = $request->input('company_id');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
       $user->password = bcrypt('password');
        // $user->created_by = auth()->user()->id;
        
        $user->save();

        if(Auth::user()->role_id == "1"){
            return redirect('/superadmin/dashboard')->with('success','Employee Created Successfully');
        }elseif(Auth::user()->role_id == "2"){
            return redirect('/admin/dashboard')->with('success','Employee Created Successfully');
        }
        elseif(Auth::user()->role_id == "3"){
            return redirect('/company/dashboard')->with('success','Employee Created Successfully');
        }  
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $user = User::find($id);

        
        if(Auth::user()->role_id == "1"){
            return view('employees.show', ['user' => $user]);
           // return view('employees.show')->with('user', $user);
            //return redirect('/superadmin/employee/view')->with('success','Employee Created, Add More');
        }elseif(Auth::user()->role_id = "2"){
            return view('employees.show', ['user' => $user]);
            //return view('employees.show')->with('user', $user);
           // return redirect('/admin/employee/view')->with('success','Employee Created, Add More');
        }
        elseif(Auth::user()->role_id == "3"){
            return view('employees.show', ['user' => $user]);
           
            //return redirect('/company/employee/view')->with('success','Employee Created, Add More');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $roles = Role::pluck('role_name', 'role_id');
        $companies = Company::pluck('name', 'id');
        $user = User::find($id);

        //Check for correct user
        if(Auth::user()->id == "4")
        {
            return redirect('/employee/errorpage')->with('error', 'Unauthorized Page');

        }

        //return view('employees.edit')->with('user', $user);
        return view('employees.edit', ['user' => $user,'companies' => $companies, 'roles' => $roles]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        //dd($request->all());
        $this->validate($request, [
            'role_id' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'company_id' => 'required',
            'email' => 'required',
            'phone' => 'required',
            // 'cover_image' => 'image|nullable|max:1999'
        ]);

        //return 123;
        //$user = new User;
        $user = User::find($id);
        $user->role_id = $request->input('role_id');
        $user->firstname = $request->input('firstname');
        $user->lastname = $request->input('lastname');
        $user->company_id = $request->input('company_id');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        //$user->password = bcrypt('password');
        // $user->created_by = auth()->user()->id;
        
        $user->save();

        if(Auth::user()->role_id == "1"){
            return redirect('/superadmin/dashboard')->with('success','Employee Updated');
        }elseif(Auth::user()->role_id == "2"){
            return redirect('/admin/dashboard')->with('success','Employee Updated');
        }
        elseif(Auth::user()->role_id == "3"){
            return redirect('/company/dashboard')->with('success','Employee Updated');
        }  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function newupdate(Request $request)
    {
        //
        //dd($request->all());
        $this->validate($request, [
            'role_id' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'company_id' => 'required',
            'email' => 'required',
            'phone' => 'required',
            // 'cover_image' => 'image|nullable|max:1999'
        ]);

        //return 123;
        //$user = new User;
        $user = User::find($request->input('user_id'));
        $user->role_id = $request->input('role_id');
        $user->firstname = $request->input('firstname');
        $user->lastname = $request->input('lastname');
        $user->company_id = $request->input('company_id');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->password = bcrypt('password');
        // $user->created_by = auth()->user()->id;
        
        $user->save();

        if(Auth::user()->role_id == "1"){
            return redirect('/superadmin/dashboard')->with('success','Employee Updated');
        }elseif(Auth::user()->role_id == "2"){
            return redirect('/admin/dashboard')->with('success','Employee Updated');
        }
        elseif(Auth::user()->role_id == "3"){
            return redirect('/company/dashboard')->with('success','Employee Updated');
        }  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user = User::find($id);
        //Check for correct user
        if(Auth::user()->id == "4")
        {
            return redirect('/employee/errorpage')->with('error', 'Unauthorized Page');

        }
        
        $user->delete();
       // return redirect('/user')->with('success','Employee Removed');
        if(Auth::user()->role_id == "1"){
            return redirect('/superadmin/employee/create')->with('success','Employee Removed');
        }elseif(Auth::user()->role_id == "2"){
            return redirect('/admin/employee/create')->with('success','Employee Removed');
        }
        elseif(Auth::user()->role_id == "3"){
            return redirect('/company/employee/create')->with('success','Employee Removed');
        }  
    
    }

    public function newdestroy(Request $request)
    {
        //
        //$user = User::find($id);
        $user = User::find($request->input('user_id'));
        //Check for correct user
        if(Auth::user()->id == "4")
        {
            return redirect('/employee/errorpage')->with('error', 'Unauthorized Page');

        }
        
        $user->delete();
       // return redirect('/user')->with('success','Employee Removed');
        if(Auth::user()->role_id == "1"){
            return redirect('/superadmin/employee/create')->with('success','Employee Removed');
        }elseif(Auth::user()->role_id == "2"){
            return redirect('/admin/employee/create')->with('success','Employee Removed');
        }
        elseif(Auth::user()->role_id == "3"){
            return redirect('/company/employee/create')->with('success','Employee Removed');
        }  
    
    }
}
