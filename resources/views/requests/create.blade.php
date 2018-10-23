@extends('layouts.app')

@section('content')
    <h1>Request Form</h1>
    {!! Form::open(['action' => 'RequestsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
        {{Form::label('lastname', 'Last Name')}}
        {{Form::text('lastname', '', ['class' => 'form-control', 'placeholder' => 'Last Name'])}}
    </div>
    <div class="form-group">
            {{Form::label('firstname', 'First Name')}}
            {{Form::text('firstname', '', ['class' => 'form-control', 'placeholder' => 'First name'])}}
    </div>
        <div class="form-group">
            {{Form::file('cover_image')}}
        </div>
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
{!! Form::close() !!}
@endsection