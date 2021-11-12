@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Companies</h1>
    {!! Form::open(['action' => 'Company\CompaniesController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data' ]) !!}
        <div class="form-group">
            {{Form::label('title', 'Name')}}
            {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Company\'s Name'])}}
        </div>
        <div class="form-group">
            {{Form::label('title', 'Email')}}
            {{Form::email('email', '', ['class' => 'form-control', 'placeholder' => 'email'])}}
            
        </div>
        <div class="form-group">
            {{Form::label('title', 'Website')}}
            {{Form::text('website', '', ['class' => 'form-control', 'placeholder' => 'website'])}}
            
        </div>
        <div class="form-group">
            {{Form::file('logo')}}
        </div>
        {{Form::submit('Submit',  ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
</div>
@endsection