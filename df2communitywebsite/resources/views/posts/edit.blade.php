@extends('layouts.app')

@section('content')
    <h1>Edit Post</h1>
    {!! Form::open(['action' => ['PostController@update', $post->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('title', 'Title')}}
            {{Form::text('title', $post->title, ['class' => 'form-control', 'placeholder' => 'Title'])}}
        </div>
        <div class="form-group">
            {{Form::label('body', 'Body')}}
            {{Form::textarea('body', $post->body, ['id' => 'article-ckeditor','class' => 'form-control', 'placeholder' => 'Title'])}}
        </div>
        <div class="form-group">
            {{Form::label('category', 'Category')}}
            {{Form::select('category', array('Bosses' => 'Bosses',
                                             'Levels' => 'Levels',
                                             'Skills' => 'Skills',
                                             'Weapons' => 'Weapons',
                                             'Loot' => 'Loot',
                                             'Maps' => 'Maps',
                                             'Quests' => 'Quests',
                                             'None' => 'None'),
                                             ['class' => 'form-control'])
            }}
        </div>
        <div class="form-group">
            {{Form::file('cover_image')}}
        </div>
        <div class="form-group">
            {{Form::label('hide', 'Hide')}}
            {{Form::hidden('hide', 'false')}}
            {{Form::checkbox('hide', 'true')}}
        </div>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection