<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use ImageResize;
use App\Models\Company;
use App\Models\User;

use Auth;
// use Mail;

use Illuminate\Support\Facades\Mail;
use App\Mail\EmailDemo;
use Symfony\Component\HttpFoundation\Response;


class CompaniesController extends Controller
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
        $companies = Company::orderBy('created_at','desc')->paginate(3);
        
        if(Auth::user()->role_id == "1"){
            return view('company.dashboard', ['companies' => $companies]);
        }elseif(Auth::user()->role_id == "2"){
            return view('company.dashboard', ['companies' => $companies]);
        }
        // elseif(Auth::user()->role_id == "3"){
        //     return view('company.dashboard', ['companies' => $companies]);
        // }  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('companies.create');
    }

    public function detail()
    {
        //
        $user_id = Auth::user()->id;
        $company_id = Auth::user()->company_id;
        $company = Company::find($company_id);
        return view('companies.details', ['company' => $company]);
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
            'name' => 'required',
            'email' => 'required',
            'logo' => 'image|nullable|max:1999',
            'website' => 'required'
        ]);

         //Handle file upload
        if($request->hasFile('logo')){
            // Get filename with the extension
            $filenameWithExt = $request->file('logo')->getClientOriginalName();
            //Get Just Filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get Just Extension
            $extension = $request->file('logo')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload the image
            
            $path = $request->file('logo')->storeAs('public/logo', $fileNameToStore);
           
        } else {
            $fileNameToStore = 'noimage.jpg';
        }  

        //return 123;
        $company = new Company();       
        $company->name = $request->input('name');
        $company->email = $request->input('email');
        $company->logo = $fileNameToStore;
        $company->website = $request->input('website');
        $company->created_by = auth()->user()->id;
        
        
        // Mail::send('mailView', $company, function($message) use ($company) {
	    //     $message->to($company->email);
	    //     $message->subject('Your Organisation has been registered with companyapp');
	    // });

        $company->save();
        // Mail::send('companies.dashboard   ', ['company' => $company], function ($m) use ($company) {
        //     $m->from('d.njoku@xlafricagroup.com', 'Your Application');

        //     $m->to($company->email, '')->subject("Congratulations user, you just got registered with company app!  You are truly awesome! ");
        // });

        //Mailtrap
        $email = $company->email;
   
        $mailData = [
            'title' => 'Welcome to company app',
            'url' => 'https://www.companyapp.io'
        ];
  
        Mail::to($email)->send(new EmailDemo($mailData));
   
        // return response()->json([
        //     'message' => 'Congratulations user, you just got registered with company app!  You are truly awesome! '
        // ], Response::HTTP_OK);

        


	    //dd('Mail Send Successfully');

        if(Auth::user()->role_id == "1"){
            return redirect('/superadmin/company/create')->with('success','Company Updated Successfully');
        }elseif(Auth::user()->role_id == "2"){
            return redirect('/admin/company/create')->with('success','Company Updated Successfully');
        }
        elseif(Auth::user()->role_id == "3"){
            return redirect('/company/company/create')->with('success','Company Updated Successfully');
        }  
    }

    public function storer(Request $request)
    {
        

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'logo' => 'image|nullable|max:1999',
            // 'logo' => 'required',
            // 'logo.*' => 'mimes:jpeg,jpg,gif,png',
            'website' => 'required'
        ]);

        
        if($request->hasFile('logo')){
            $logo = $request->file('logo');
            $input['logo'] = time().'.'.$logo->extension();
        
            $destinationPath = public_path('/public/logo');
            $log = ImageResize::make($logo->path());
            $log->resize(100, 100, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$input['logo']);
        
            $destinationPath = public_path('/public/logo');
            $logo->move($destinationPath, $input['logo']);
            $fileNameToStore = $input['logo'];
        } else {
            $fileNameToStore = 'noimage.jpg';
        }
            
            //return 123;
            $company = new Company();       
            $company->name = $request->input('name');
            $company->email = $request->input('email');
            $company->logo = $fileNameToStore;
            $company->website = $request->input('website');
            $company->created_by = auth()->user()->id;
            
            
            $company->save();

            if(Auth::user()->role_id == "1"){
                return redirect('/superadmin/company/create')->with('success','Company Updated Successfully');
            }elseif(Auth::user()->role_id == "2"){
                return redirect('/admin/company/create')->with('success','Company Updated Successfully');
            }
            elseif(Auth::user()->role_id == "3"){
                return redirect('/company/company/create')->with('success','Company Updated Successfully');
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
        $company = Company::find($id);

        
        if(Auth::user()->role_id == "1"){
            return view('companies.show', ['company' => $company]);
           // return view('employees.show')->with('user', $user);
            //return redirect('/superadmin/employee/view')->with('success','Employee Created, Add More');
        }elseif(Auth::user()->role_id = "2"){
            return view('companies.show', ['company' => $company]);
            //return view('employees.show')->with('user', $user);
           // return redirect('/admin/employee/view')->with('success','Employee Created, Add More');
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
        $company = Company::find($id);

        //Check for correct user
        if(Auth::user()->id == "4" || Auth::user()->id == "3")
        {
            return redirect('/company/errorpage')->with('error', 'Unauthorized Page');

        }

        return view('companies.edit')->with('company', $company);
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
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'logo' => 'image|nullable|max:1999',
            // 'logo' => 'required',
            // 'logo.*' => 'mimes:jpeg,jpg,gif,png',
            'website' => 'required'
        ]);

        if($request->hasFile('logo')){
            $logo = $request->file('logo');
            $input['logo'] = time().'.'.$logo->extension();
        
            $destinationPath = public_path('/logo');
            $log = ImageResize::make($logo->path());
            $log->resize(100, 100, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$input['logo']);
        
            $destinationPath = public_path('/logo');
            $logo->move($destinationPath, $input['logo']);
            $fileNameToStore = $input['logo'];
        } else {
            $fileNameToStore = 'noimage.jpg';
        }
            
            //return 123;
            $company = Company::find($request->input('company_id'));      
            $company->name = $request->input('name');
            $company->email = $request->input('email');
            $company->logo = $fileNameToStore;
            $company->website = $request->input('website');
            //$company->created_by = auth()->user()->id;
            
            
            $company->save();

            if(Auth::user()->role_id == "1"){
                return redirect('/superadmin/company/create')->with('success','Company Updated Successfully');
            }elseif(Auth::user()->role_id == "2"){
                return redirect('/admin/company/create')->with('success','Company Updated Successfully');
            }
           
    }

    public function newupdate(Request $request)
    {
        //
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'logo' => 'image|nullable|max:1999',
            // 'logo' => 'required',
            // 'logo.*' => 'mimes:jpeg,jpg,gif,png',
            'website' => 'required'
        ]);

        
        if($request->hasFile('logo')){
            // Get filename with the extension
            $filenameWithExt = $request->file('logo')->getClientOriginalName();
            //Get Just Filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get Just Extension
            $extension = $request->file('logo')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload the image
            
            $path = $request->file('logo')->storeAs('public/logo', $fileNameToStore);
           
        } else {
            $fileNameToStore = 'noimage.jpg';
        }  
            
            //return 123;
            //$company = new Company(); 
            $company = Company::find($request->input('company_id'));      
            $company->name = $request->input('name');
            $company->email = $request->input('email');
            $company->logo = $fileNameToStore;
            $company->website = $request->input('website');
            //$company->created_by = auth()->user()->id;
            
            
            $company->save();

            if(Auth::user()->role_id == "1"){
                return redirect('/superadmin/company/create')->with('success','Company Updated Successfully');
            }elseif(Auth::user()->role_id == "2"){
                return redirect('/admin/company/create')->with('success','Company Updated Successfully');
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
        $company = Company::find($id);
        //Check for correct user
        if(Auth::user()->id == "4" || Auth::user()->id == "3")
        {
            return redirect('/company/errorpage')->with('error', 'Unauthorized Page');

        }
        
        $company->delete();
       // return redirect('/user')->with('success','Employee Removed');
        if(Auth::user()->role_id == "1"){
            return redirect('/superadmin/company/create')->with('success','Company Removed');
        }elseif(Auth::user()->role_id == "2"){
            return redirect('/admin/company/create')->with('success','Company Removed');
        }
    }

    public function newdestroy(Request $request)
    {
        //
        $company = Company::find($request->input('company_id'));
        //Check for correct user
        if(Auth::user()->id == "4" || Auth::user()->id == "3")
        {
            return redirect('/company/errorpage')->with('error', 'Unauthorized Page');

        }
        
        $company->delete();
       // return redirect('/user')->with('success','Employee Removed');
        if(Auth::user()->role_id == "1"){
            return redirect('/superadmin/company/create')->with('success','Company Removed');
        }elseif(Auth::user()->role_id == "2"){
            return redirect('/admin/company/create')->with('success','Company Removed');
        }
        
    }
}
