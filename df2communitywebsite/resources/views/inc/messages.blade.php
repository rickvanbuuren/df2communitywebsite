@if(count($errors))
    @foreach($errors->all() as $error)
        <div class="alert alert-danger">{{$error}}</div>

    @endforeach
@endif

@if(session('succes'))
    <div class="alert alert-success">
        {{session('error')}}
    </div>
@endif