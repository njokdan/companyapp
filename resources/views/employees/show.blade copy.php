@extends('layouts.app')

@section('content')
<a href="/companies" class="btn btn-default">Go Back</a>
    <h1>{{$company->title}}</h1>
    <img style="width:100%" src="/storage/logo/{{$company->logo}}">
    <!-- <img style="width:100%" src="{{$post->logo_path}}"> -->
    <br><br>
    <div>
        {!!$company->email!!}
    </div>
    <hr>
    <small>Written on {{$company->created_at}} By {{$company->user->name}}</small>
    <!-- Block against user not signed in -->
    @if(!Auth::guest())
        <!-- Block against user signed in but post doesn't belong to user -->
        <!-- Hence, Can Only delete or edit your own post -->
        @if(Auth::user()->id === $company->user_id)
            <hr>
            <a href="/companies/employee/{{$company->id}}/edit" class="btn btn-default">Edit</a>
            {!!Form::open(['action' => ['CompaniesController@destroy', $company->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                {{Form::hidden('_method','DELETE')}}
                {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}  
        @endif      
    @endif
@endsection