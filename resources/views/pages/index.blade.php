@extends('layouts.app')

@section('content')  
<div class="container">
    {{-- <img style="width:100%;" src="/storage/cover_images/headers/header-maasim.jpg" class="img-fluid" alt="Responsive image"> --}}
        <div class="jumbotron">   
                        <h1>Welcome To {{$title}}</h1>
                        <p>This is the official information website for the municipality of Maasim</p>
        </div>
        {{-- <div class="panel right text-center col-md-5">
        <clock-app></clock-app>
        </div> --}}
        <div class="row featurette">
                        <div class="col-md-7">
                          <calendar-app></calendar-app>
                        </div>
                        <div class="col-md-5">
                          <clock-app class="right"></clock-app>
                          <img style="width:100%;" class="featurette-image img-fluid mx-auto" src="/storage/cover_images/headers/header-home.png" alt="Generic placeholder image">
                           <h2 class="featurette-heading">Maasim Municipality</h2>
                          <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
                        </div>
                      </div>
        </div>
@endsection             