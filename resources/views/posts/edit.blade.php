@extends('layouts.appWithCk')

@section('content')
    <h1>Edit Announcement</h1>
    {!! Form::open(['action' => ['PostsController@update', $post->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('title', 'Title')}}
            {{Form::text('title', $post->annc_title, ['class' => 'form-control', 'placeholder' => 'Title'])}}
        </div>
        <div class="form-group">
                {{Form::label('body', 'Body')}}
                {{Form::textarea('body', $post->annc_content, ['id' => 'article-ckeditor','class' => 'form-control', 'placeholder' => 'Body Text'])}}
            </div>
            <div class="form-group">
                    {{Form::file('cover_image')}}
            </div>
            {{Form::hidden('_method','PUT')}}
            {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
@endsection