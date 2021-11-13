@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Company</h1>
    {!! Form::open(['action' =>'Company\CompaniesController@newupdate', 'method' => 'POST', 'enctype' => 'multipart/form-data' ]) !!}

        <div class="form-group">
            {{-- {{Form::label('title', 'Name')}} --}}
            {{Form::hidden('company_id',  $company->id)}}
        </div>
        <div class="form-group">
            {{Form::label('title', 'Name')}}
            {{Form::text('name', $company->name, ['class' => 'form-control', 'placeholder' => 'Name'])}}
        </div>
        <div class="form-group">
            {{Form::label('title', 'Email')}}
            {{Form::email('email', $company->email, ['class' => 'form-control', 'placeholder' => 'Email'])}}
            
        </div>
        <div class="form-group">
            {{Form::label('title', 'Website')}}
            {{Form::text('website', $company->website, ['class' => 'form-control', 'placeholder' => 'Website'])}}
            
        </div>
        <div class="form-group">
            {{Form::file('logo')}}
        </div>
        
        {{Form::submit('Save',  ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
</div>
@endsection