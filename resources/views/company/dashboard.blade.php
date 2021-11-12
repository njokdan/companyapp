@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Companies</h1>
    @if(count($companies)>0)
        @foreach ($companies as $company)
            
                        {{-- <h3><a href="/companies/{{$company->id}}/show">{{$company->name}} - {{$company->website}}</a></h3>
                        <small>Written on {{$company->created_at}} By {{$company->created_by}}</small>
                     --}}
                        @if(Auth::user()->role_id==1)
                        <div class="well my-3">
                            <div class="row">
                                <div class="col-md-4 col-sm-4">
                                    <img style="width:50%" src="/storage/logo/{{$company->logo}}">
                                    {{-- <img style="width:100%" src="{{$post->logo_path}}"> --}}
                                </div>
                                <div class="col-md-8 col-sm-8">
                                    <h3><a href="/superadmin/{{$company->id}}/show">{{$company->name}} - {{$company->email}} {{$company->website}}</a></h3>
                                    <small>Created on {{$company->created_at}} By {{$company->created_by}}</small>
                                </div>
                            </div>
                        </div>
                        @endif
                        <br>
                        @if(Auth::user()->role_id==2)
                        <div class="well  my-3">
                            <div class="row">
                                <div class="col-md-4 col-sm-4">
                                    <img style="width:50%" src="/storage/logo/{{$company->logo}}">
                                    {{-- <img style="width:100%" src="{{$post->logo_path}}"> --}}
                                </div>
                                <div class="col-md-8 col-sm-8">
                                    <h3><a href="/admin/{{$company->id}}/show">{{$company->name}} - {{$company->email}} {{$company->website}}</a></h3>
                                    <small>Created on {{$company->created_at}} By {{$company->created_by}}</small>
                                    
                                </div>
                            </div>
                        </div>
                        @endif
                        
                    
        @endforeach
        <div class="row  mb-3 py-4">
            <div class="col-12">
                {{$companies->links()}}
            </div>
        </div>
    @else

        <p>No companies found</p>

    @endif
</div>
@endsection