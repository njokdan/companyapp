@extends('layouts.app')

@section('content')
    <h1>Companies</h1>
    @if(count($companies)>0)
        @foreach ($companies as $company)
            <div class="well">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <img style="width:100%" src="/storage/logo/{{$post->logo}}">
                        {{-- <img style="width:100%" src="{{$post->logo_path}}"> --}}
                    </div>
                    <div class="col-md-8 col-sm-8">
                        <h3><a href="/companies/{{$company->id}}">{{$company->title}}</a></h3>
                        <small>Written on {{$company->created_at}} By {{$company->user->name}}</small>
                    </div>
                </div>
            </div>
        @endforeach
        {{$companies->links()}}
    @else

        <p>No companies found</p>

    @endif
@endsection