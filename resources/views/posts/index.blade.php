@extends('layouts.app')

@section('content')
    <h1>Announcements</h1>
    @if(count($posts) > 0)
        @foreach($posts as $post)
            <div class="well">
            <div class="row">
                <div class="col-md-4 col-sm-4">
                <img style="width:50%" src="/storage/cover_images/{{$post->cover_image}}" alt="">
                </div>
                <div class="col-md-8 col-sm-8">
                    <h3><a href="/announcements/{{$post->id}}">{{$post->annc_title}}</a></h3>
                    <small>Posted on {{$post->created_at}}</small>
                </div>
            </div>
            </div>
        @endforeach
        {{$posts->links()}}
    @else
        <p>No post found!</p>
    @endif
@endsection