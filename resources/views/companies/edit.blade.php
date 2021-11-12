@extends('layouts.app')

@section('content')
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
            {{//Form::textarea('body', $post->body, ['class' => 'form-control', 'placeholder' => 'Body Text'])
            }}
        </div>
        <div class="form-group">
            {{Form::label('title', 'Website')}}
            {{Form::email('website', $company->website, ['class' => 'form-control', 'placeholder' => 'Website'])}}
            {{//Form::textarea('body', $post->body, ['class' => 'form-control', 'placeholder' => 'Body Text'])
            }}
        </div>
        <div class="form-group">
            {{Form::file('logo')}}
        </div>
        {{-- {{Form::hidden('_method','PUT')}} --}}
        {{Form::submit('Save',  ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection