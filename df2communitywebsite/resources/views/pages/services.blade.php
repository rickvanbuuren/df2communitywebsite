@extends('layouts.main')

@section('content')
    <h1>{{$title}}</h1>
    <p>{{$contenttitle}}</p>
    @if(count($services) > 0)
        <ul>
            @foreach($services as $service)
                <li>{{$service}}</li>
            @endforeach
        </ul>
    @endif
@endsection
