@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="TEST1"></div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="/posts/create" class="btn btn-primary">Create Post</a>
                    @if(Auth::user()->role == 'admin')
                            <h3>Welcome Admin</h3>
                    @else
                            <h3>Your blog posts</h3>
                    @endif

                    @if(count($posts) > 0)
                        <table  class="table table-striped">
                            <tr>
                                <th colspan="2">Title</th>
                                @if(Auth::user()->role == 'admin')
                                    <th colspan="2">username</th>
                                @endif
                                <th colspan="1"></th>
                                <th colspan="2"></th>
                                <th colspan="2">Hide</th>
                            </tr>
                            @foreach($posts as $post)
                                <tr>
                                    <td colspan="2">{{$post->title}}</td>
                                    @if(Auth::user()->role == 'admin')
                                        <td colspan="2">{{$post->user->name}}</td>
                                    @endif
                                    <td colspan="1"><a href="/posts/{{$post->id}}/edit" class="btn btn-default">Edit</a></td>
                                    <td colspan="2">
                                        {!! Form::open(['action' => ['PostController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right']) !!}
                                            {{Form::hidden('_method', 'DELETE') }}
                                            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                        {!! Form::close() !!}
                                    </td>
                                    <td colspan="2">
                                        {!! Form::open(['action' => ['PostController@update', $post->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                                        <label class="switch">
                                            {{Form::hidden('hide', 'false')}}
                                            @if($post->hidden == "true")
                                                {{Form::checkbox('hide', 'true', true)}}
                                                <span class="slider"></span>
                                            @else
                                                {{Form::checkbox('hide', 'true')}}
                                                <span class="slider"></span>
                                            @endif
                                        </label>
                                        {{Form::hidden('title', $post->title)}}
                                        {{Form::hidden('category', $post->category)}}
                                        {{Form::hidden('body', $post->body)}}
                                        {{Form::hidden('_method', 'PUT')}}
                                        {{Form::submit('Save', ['class' => 'btn btn-primary'])}}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    @else
                    <p>You have no posts</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
