@extends('layouts.app')

@section('content')
    <div class="container">
    <h1>Create Employees</h1>
    {!! Form::open(['action' => 'Employee\EmployeesController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data' ]) !!}
        <div class="form-group">
            {{Form::label('title', 'Role:')}}
            {!! Form::select('role_id', $roles, null, ['class' => 'form-control']) !!}
            {{-- {{Form::select('role_id', array('1' => 'superadmin', '2' => 'admin', '3' => 'company', '4' => 'employee'), ['class' => 'form-control'])}} --}}
        </div>
        <div class="form-group">
            {{Form::label('title', 'First Name:')}}
            {{Form::text('firstname', '', ['class' => 'form-control', 'placeholder' => 'First Name'])}}
        </div>
        <div class="form-group">
            {{Form::label('title', 'Last Name:')}}
            {{Form::text('lastname', '', ['class' => 'form-control', 'placeholder' => 'Last Name'])}}
        </div>
        <div class="form-group">
            {{Form::label('title', 'Company:')}}
            {!! Form::select('company_id', $companies, null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {{Form::label('title', 'Email:')}}
            {{Form::email('email', '', ['class' => 'form-control', 'placeholder' => 'email'])}}            
        </div>
        <div class="form-group">
            {{Form::label('title', 'Phone:')}}
            {{Form::text('phone', '', ['class' => 'form-control', 'placeholder' => 'phone'])}}
        </div>
        {{Form::submit('Submit',  ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
    </div>
@endsection