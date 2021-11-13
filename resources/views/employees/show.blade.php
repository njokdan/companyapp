@extends('layouts.app')

@section('content')
<div class="container">
{{-- <a href="/companies" class="btn btn-default">Go Back</a> --}}
    <h1>{{$user->firstname}} {{$user->lastname}} </h1>
    <br><br>
    <div>
        {!!$user->email!!}
    </div>

    <div>
        {!!$user->phone!!}
    </div>
    <hr>
    <small>Created on {{$user->created_at}} </small>
    <!-- Block against user not signed in -->
    @if(!Auth::guest())
        <!-- Block against user signed in but post doesn't belong to user -->
        <!-- Hence, Can Only delete or edit your own post -->
        @if(Auth::user()->role_id != "4")
            <hr>
            @if(Auth::user()->role_id==1)
                <a href="/superadmin/employee/{{$user->id}}/edit" class="btn btn-primary ">Edit</a>
                {!!Form::open(['action' =>'Employee\EmployeesController@newdestroy', 'method' => 'POST', 'enctype' => 'multipart/form-data'])!!}
                    {{Form::hidden('user_id',$user->id)}}
                    {{Form::submit('remove',['class' => 'btn btn-danger'])}}
                {!!Form::close()!!}  
            @endif
            {{-- @if(Auth::user()->role_id==2)
                <a href="/admin/{{$user->id}}/edit" class="btn btn-primary ">Edit</a>
            @endif --}}
            
        @endif      
    @endif
</div>
@endsection