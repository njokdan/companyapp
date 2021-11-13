@extends('layouts.app')

@section('content')
<div class="container">
<a href="/companies" class="btn btn-default">Go Back</a>
    <h1>{{$company->name}}</h1>
    <img style="width:25%" src="/storage/logo/{{$company->logo}}">
    {{-- <img style="width:100%" src="{{$company->logo_path}}"> --}}
    <br><br>
    <div>

        {!!$company->email!!}-{!!$company->website!!}
    </div>
    <hr>
    <small>Created on {{$company->created_at}} By {{$company->created_by}}</small>
    <!-- Block against user not signed in -->
    @if(!Auth::guest())
        <!-- Block against user signed in but company restricted to user -->
        <!-- Hence, Can Only delete or edit your company -->
        {{-- @if(Auth::user()->id === $company->user_id) --}}
            <hr>
            @if(Auth::user()->role_id==1)
                <a href="/superadmin/company/{{$company->id}}/edit" class="btn btn-primary ">Edit</a>
                {!!Form::open(['action' => 'Company\CompaniesController@newdestroy', 'method' => 'POST', 'class' => 'pull-right'])!!}
            
                    {{Form::hidden('company_id',$company->id)}}
                    {{Form::submit('remove',['class' => 'btn btn-danger'])}}
                {!!Form::close()!!} 
            @endif
            {{-- @if(Auth::user()->role_id==2)
                <a href="/admin/{{$user->id}}/edit" class="btn btn-primary ">Edit</a>
            @endif --}}
           
             
        {{-- @endif       --}}
    @endif
</div>
@endsection