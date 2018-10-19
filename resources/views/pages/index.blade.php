@extends('layouts.app')

@section('content')  
{{-- <img style="width:100%;" src="/storage/cover_images/headers/header-maasim.jpg" class="img-fluid" alt="Responsive image"> --}}
        <div class="jumbotron">   
                        <h1>Welcome To {{$title}}</h1>
                        <p>This is the official information site for the municipality of Maasim</p>
        </div>
        <div class="row featurette">
                        <div class="col-md-7">
                          <h2 class="featurette-heading">First featurette heading. <span class="text-muted">It'll blow your mind.</span></h2>
                          <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
                        </div>
                        <div class="col-md-5">
                          <img style="width:100%;" class="featurette-image img-fluid mx-auto" src="/storage/cover_images/headers/header-home.png" alt="Generic placeholder image">
                        </div>
                      </div>
@endsection             