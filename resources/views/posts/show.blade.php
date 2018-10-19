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
      <h2 class="featurette-heading">{{$post->annc_title}}</h2>
      <small>Posted on {{$post->created_at}}</small>
      <hr class="featurette-divider">
      <p class="lead">{!!$post->annc_content!!}</p>
    </div>
    <div class="col-md-5">
      <img style="width:100%" class="featurette-image img-fluid mx-auto" src="/storage/cover_images/{{$post->cover_image}}" alt="Generic placeholder image">
    </div>
  </div>
@endsection