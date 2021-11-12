<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use ImageResize;
use App\Models\Company;
use App\Models\User;

use Auth;
use Mail;


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
        Mail::send('companies.dashboard   ', ['company' => $company], function ($m) use ($company) {
            $m->from('d.njoku@xlafricagroup.com', 'Your Application');

            $m->to($company->email, '')->subject("Congratulations user, you just got registered with company app!  You are truly awesome! ");
        });

        


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

        
   
        $logo = $request->file('logo');
        $input['logo'] = time().'.'.$image->extension();
      
        $destinationPath = public_path('/images');
        $log = ImageResize::make($logo->path());
        $log->resize(100, 100, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$input['logo']);
    
        $destinationPath = public_path('/images');
        $logo->move($destinationPath, $input['logo']);
  
        
        //return 123;
        $company = new Company();       
        $company->name = $request->input('name');
        $company->email = $request->input('email');
        $company->logo = $input['logo'];
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
    }
}
