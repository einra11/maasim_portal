@extends('layouts.dashboardApp')
@section('content')
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <main-app></main-app>
@endsection
