@extends('layouts.app')

@section('content')

<h1>Service page!!</h1>

@if(count($services) > 0)
<calendar-app></calendar-app>
@endif

@endsection