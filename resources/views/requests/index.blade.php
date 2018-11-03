@extends('layouts.app')

@section('content')
<div class="col-md-offset-0">
                <div class="panel panel-default">
                                <h1 class="panel-heading">Request Form</h1>
                                <div class="panel-body">
                                        <div class="form-row">
                                                {!! Form::open(['action' => 'RequestsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                                                <div class="form-group col-md-4">
                                                    {{Form::label('lastname', 'Last Name')}}
                                                    {{Form::text('lastname', '', ['class' => 'form-control', 'placeholder' => 'Last Name'])}}
                                                </div>
                                                <div class="form-group col-md-4">
                                                        {{Form::label('firstname', 'First Name')}}
                                                        {{Form::text('firstname', '', ['class' => 'form-control', 'placeholder' => 'First name'])}}
                                                </div>
                                                <div class="form-group col-md-4">
                                                        {{Form::label('middlename', 'Middle Name')}}
                                                        {{Form::text('middlename', '', ['class' => 'form-control', 'placeholder' => 'Middle name'])}}
                                                </div>
                                                <div class="form-group col-md-6">
                                                        {{Form::label('email', 'Email Address')}}
                                                        {{Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'example@gmail.com'])}}
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <div class="col-md-3">
                                                            {{Form::label('birthdate', 'Birth-Month')}}
                                                            {{Form::selectMonth('month', '', ['class' => 'form-control'])}}
                                                    </div>
                                                    <div class="col-md-3">
                                                            {{Form::label('birthdate', 'Birth-Day')}}
                                                            {{Form::selectRange('day', 1, 31, '',['class' => 'form-control'])}}
                                                    </div>
                                                    <div class="col-md-3">
                                                            {{Form::label('birthdate', 'Birth-Year')}}
                                                            {{Form::selectRange('year', 2018, 1900, '',['class' => 'form-control'])}}
                                                    </div>
                                                    <div class="col-md-3">
                                                            {{Form::label('gender', 'Gender')}}
                                                            {{Form::select('gender', ['M' => 'Male', 'F' => 'Female'], '',['class'=>'form-control'])}}
                                                        </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                        {{Form::label('contact', 'Cellphone No.')}}
                                                        {{Form::text('contact', '', ['class' => 'form-control', 'placeholder' => '+639*******'])}}
                                                </div>
                                                <div class="form-group col-md-6">
                                                        {{Form::label('request', 'Requested Items')}}
                                                        <br>
                                                        <div class="form-group col-md-3">
                                                                {{Form::label('request', 'Barangay Certificate')}}
                                                                {{Form::checkbox('requestP[]', 'Barangay Certificate')}}
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                                {{Form::label('request', 'Barangay Clearance')}}
                                                                {{Form::checkbox('requestP[]', 'Barangay Clearance')}}
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                                {{Form::label('request', 'Notice of Hearing')}}
                                                                {{Form::checkbox('requestP[]', 'Notice of Hearing')}}
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                                {{Form::label('request', 'IST Summons')}}
                                                                {{Form::checkbox('requestP[]', 'IST Summons')}}
                                                        </div>
                                                </div>
                                                    <div class="form-group col-md-12">
                                                            {{Form::label('purpose', 'Purpose')}}
                                                            {{Form::textarea('purpose', '', ['class' => 'form-control', 'placeholder' => 'purpose...'])}}
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                            {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
                                                    </div>
                                                    {{-- <div class="form-group col-md-6">
                                                        {{Form::file('cover_image')}}
                                                    </div> --}}
                                            {!! Form::close() !!}
                                        </div>
                                </div>
                        </div>
</div>
@endsection