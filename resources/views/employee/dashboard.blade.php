{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Employee') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <p> Welcome to Employee Dashboard</p>
                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

@extends('layouts.app')

@section('content')
<div class="container">
    
    <h1>Employees</h1>
    @if(count($users)>0)
        @foreach ($users as $user)
           
                        @if(Auth::user()->role_id==1)
                        <div class="well  my-3">
                            <div class="row">
                                        {{-- <div class="col-md-4 col-sm-4"> --}}
                                            {{-- <img style="width:100%" src="/storage/logo/{{$user->logo}}"> --}}
                                            {{-- <img style="width:100%" src="{{$user->logo_path}}"> --}}
                                        {{-- </div> --}}
                                        <div class="col-md-8 col-sm-8">
                                    <h3><a href="/superadmin/{{$user->id}}/show">{{$user->firstname}} {{$user->lastname}}</a></h3>
                                    <small>Written on {{$user->created_at}} By {{$user->firstname}}</small>
                                </div>
                            </div>
                        </div>
                        @endif
                        @if(Auth::user()->role_id==2)
                        <div class="well  my-3">
                            <div class="row">
                                        {{-- <div class="col-md-4 col-sm-4"> --}}
                                            {{-- <img style="width:100%" src="/storage/logo/{{$user->logo}}"> --}}
                                            {{-- <img style="width:100%" src="{{$user->logo_path}}"> --}}
                                        {{-- </div> --}}
                                <div class="col-md-8 col-sm-8">
                                    <h3><a href="/admin/{{$user->id}}/show">{{$user->firstname}} {{$user->lastname}}</a></h3>
                                    <small>Written on {{$user->created_at}} By {{$user->firstname}}</small>
                                </div>
                            </div>
                        </div>
                        @endif
                        @if(Auth::user()->role_id==3)
                        <div class="well  my-3">
                            <div class="row">
                                        {{-- <div class="col-md-4 col-sm-4"> --}}
                                            {{-- <img style="width:100%" src="/storage/logo/{{$user->logo}}"> --}}
                                            {{-- <img style="width:100%" src="{{$user->logo_path}}"> --}}
                                        {{-- </div> --}}
                                        <div class="col-md-8 col-sm-8">
                                    <h3><a href="/company/{{$user->id}}/show">{{$user->firstname}} {{$user->lastname}}</a></h3>
                                    <small>Written on {{$user->created_at}} By {{$user->firstname}}</small>
                                </div>
                            </div>
                        </div>
                        @endif
                        @if(Auth::user()->role_id==4)
                        <div class="well my-3">
                            <div class="row">
                                        {{-- <div class="col-md-4 col-sm-4"> --}}
                                            {{-- <img style="width:100%" src="/storage/logo/{{$user->logo}}"> --}}
                                            {{-- <img style="width:100%" src="{{$user->logo_path}}"> --}}
                                        {{-- </div> --}}
                                        <div class="col-md-8 col-sm-8">
                                    <h3><a href="/employee/{{$user->id}}/show">{{$user->firstname}} {{$user->lastname}}</a></h3>
                                    <small>Written on {{$user->created_at}} By {{$user->firstname}}</small>
                                </div>
                            </div>
                        </div>
                        @endif
                    
        @endforeach
       <div class="row  my-3">
           <div class="col-12 py-4 mb-4">
               {{$users->links()}}
            </div>
       </div>
    @else

        <p>No user found</p>

    @endif
        </div>
@endsection