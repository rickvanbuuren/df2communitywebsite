@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Settings</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <h3>Your Settings</h3>

                        {{--<table  class="table table-striped">--}}
                            {{--<tr>--}}
                                {{--<th>Title</th>--}}
                            {{--</tr>--}}
                            {{--@foreach($posts as $post)--}}
                                {{--<tr>--}}
                                    {{--<td>{{$post->title}}</td>--}}
                                    {{--<td><a href="/posts/{{$post->id}}/edit" class="btn btn-default">Edit</a></td>--}}
                                {{--</tr>--}}

                            {{--@endforeach--}}
                        {{--</table>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection