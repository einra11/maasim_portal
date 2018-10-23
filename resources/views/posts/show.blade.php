@extends('layouts.app')

@section('content')
<div class="row featurette">
    <div class="col-md-7">
    <a href="/announcements" class="btn btn-default">Go back</a>
    @if(!Auth::guest())
    <a href="/announcements/{{$post->id}}/edit" class="btn btn-default">Edit</a>
        @if(Auth::user()->id == $post->user_id)
            {!!Form::open(['action'=>['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                {{Form::hidden('_method','DELETE')}}
                {{Form::submit('Delete', ['class'=>'btn btn-danger'])}}
            {!!Form::close()!!}
        @endif
    @endif
    <div class="panel panel-default">
            <h2 class="panel-heading">{{$post->annc_title}}</h2>
            <div class="panel-body">
                    <p class="lead text-justify">{!!$post->annc_content!!}</p>
                    <hr class="featurette-divider">
                    <small>Posted on {{$post->created_at}}</small>
            </div>
    </div>
    </div>
    <div class="col-md-5">
      <img style="width:100%" class="featurette-image img-fluid mx-auto" src="/storage/cover_images/{{$post->cover_image}}" alt="Generic placeholder image">
    </div>
  </div>
@endsection