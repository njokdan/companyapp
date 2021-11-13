@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Employee</h1>
    {!! Form::open(['action' => 'Employee\EmployeesController@newupdate', 'method' => 'POST', 'enctype' => 'multipart/form-data' ]) !!}
        {{-- <div class="form-group">
            {{Form::label('title', 'Name')}}
            {{Form::text('title', $post->name, ['class' => 'form-control', 'placeholder' => 'Name'])}}
        </div>
        <div class="form-group">
            {{Form::label('title', 'Email')}}
            {{Form::email('title', $post->email, ['class' => 'form-control', 'placeholder' => 'Email'])}}
            {{//Form::textarea('body', $post->body, ['class' => 'form-control', 'placeholder' => 'Body Text'])
            }}
        </div> --}}
        <div class="form-group">
            {{-- {{Form::label('title', 'Name')}} --}}
            {{Form::hidden('user_id',  $user->id)}}
        </div>
        <div class="form-group">
            {{Form::label('title', 'Role:')}}
             {!! Form::select('role_id', $roles, $user->role_id, ['class' => 'form-control']) !!}
            {{-- {{Form::select('role_id', array('1' => 'superadmin', '2' => 'admin', '3' => 'company', '4' => 'employee'), $user->role_id, ['class' => 'form-control'])}} --}}
        </div>
        <div class="form-group">
            {{Form::label('title', 'First Name:')}}
            {{Form::text('firstname', $user->firstname, ['class' => 'form-control', 'placeholder' => 'First Name'])}}
        </div>
        <div class="form-group">
            {{Form::label('title', 'Last Name:')}}
            {{Form::text('lastname', $user->lastname, ['class' => 'form-control', 'placeholder' => 'Last Name'])}}
        </div>
        <div class="form-group">
            {{Form::label('title', 'Company:')}}
            {!! Form::select('company_id', $companies, $user->company_id, ['class' => 'form-control']) !!}
            {{-- {{Form::select('company', array('1' => 'compa', '2' => 'compb', '3' => 'compc', '4' => 'compd'), $user->company, ['class' => 'form-control'])}} --}}
        </div>
        <div class="form-group">
            {{Form::label('title', 'Email:')}}
            {{Form::email('email', $user->email, ['class' => 'form-control', 'placeholder' => 'email'])}}            
        </div>
        <div class="form-group">
            {{Form::label('title', 'Phone:')}}
            {{Form::text('phone', $user->phone, ['class' => 'form-control', 'placeholder' => 'phone'])}}
        </div>  
        {{-- <div class="form-group">
            {{Form::file('logo')}}
        </div> --}}
        {{-- {{Form::hidden('_method','PUT')}} --}}
        {{Form::submit('Save',  ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
</div>
@endsection