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
                        <h3>User settings</h3>

                        <table  class="table table-striped">
                            <tr>
                                <th>Username</th>
                                <th>Role</th>
                            </tr>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user->name}}</td>
                                    <td>
                                        {!! Form::open(['action' => ['SettingsController@update', $user->id], 'method' => 'POST']) !!}
                                        @if($user->role == "admin")
                                            {{Form::select('role', array('admin' => 'admin', 'user' => 'user'))}}
                                        @else
                                            {{Form::select('role', array('user' => 'user', 'admin' => 'admin'))}}
                                        @endif
                                            {{Form::hidden('_method', 'PUT')}}
                                            {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection