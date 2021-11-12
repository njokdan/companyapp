@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <a href="/companies/create" class="btn btn-primary">Create Company</a>
                        @if(count($companies)>0)
                            <h3>Your Companies List</h3>
                            {{-- {{ __('You are logged in!') }} --}}

                            <table class="table table-striped">
                                <tr>
                                    <th>Name</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                @foreach ($companies as $company)
                                    <tr>
                                        <td>{{$company->name}}</td>
                                        <td><a href="/companies/{{$company->id}}/edit" class="btn btn-primary">Edit</a></td>
                                        <td>
                                            {!!Form::open(['action' => ['CompaniesController@destroy', $company->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                                {{Form::hidden('_method','DELETE')}}
                                                {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
                                            {!!Form::close()!!}
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        @else

                            <p>You have No companies found</p>

                        @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
