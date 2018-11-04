@extends('layouts.app')

@section('content')
    <div class="row" style="margin: 20px;">
        <div class="col-md-8 col-sm-8">
            <h1>Posts</h1>
        </div>
        <div class="col-md-4 col-sm-4">
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Filters
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="/posts?category=Bosses">Bosses</a>
                    <a class="dropdown-item" href="/posts?category=Levels">Levels</a>
                    <a class="dropdown-item" href="/posts?category=Skills">Skills</a>
                    <a class="dropdown-item" href="/posts?category=Weapons">Weapons</a>
                    <a class="dropdown-item" href="/posts?category=Maps">Maps</a>
                    <a class="dropdown-item" href="/posts?category=Quests">Quests</a>
                    <a class="dropdown-item" href="/posts?category=None">None</a>
                    <a class="dropdown-item" href="/posts">Remove filter</a>
                </div>
            </div>
        </div>
    </div>

    @if(count($posts) > 0)
        @foreach($posts as $post)
            <div class="card mx-auto" style="margin-top: 20px;">
                <div style="margin: 30px;">
                    <div>
                        <small>Category: {{$post->category}}</small>
                    </div>
                    <h2>
                        <a href="/posts/{{$post->id}}">{{$post->title}}</a>
                    </h2>
                    <div class="row">
                        <div class="col-md-4 col-sm-4">
                            <figure class="figure">
                                <img style="width: 100%" src="/storage/cover_images/{{$post->cover_image}}">
                            </figure>
                        </div>
                        <div class="col-md-8 col-sm-8" style="max-height: 330px;overflow: hidden;">
                            {{$post->body}}
                        </div>
                    </div>
                    <small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
                </div>
            </div>

        @endforeach
        {{--{{$posts->links()}}--}}
    @else
        <p>No posts found</p>
    @endif
@endsection