@extends('layouts.app')


@section('content')
    <div class="jumbotron text-center">
        <h1>Welcome to The Dead Frontier 2 community website!</h1>
        {{--<p>This a website made with Laravel</p>--}}
        <p>
            <a class="btn btn-primary btn-lg" href="/login" role="button">Login</a>
            <a class="btn btn-success btn-lg" href="/register" role="button">Register</a>
        </p>
    </div>
    @include('trending')
@endsection