@extends('layouts.app')


@section('content')
<h1>Create Post</h1>

{{-- <form method="post" action="/post"> --}}

{!! Form::open(['method'=>'POST','action'=>'PostController@store']) !!}
    @csrf
    <div class="form-group">
        {!! Form::label('title','Title:') !!}
        {!! Form::text('title',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Create Post',['class'=>'btn btn-primary']) !!}
    </div>
    
    {{-- <input type='text' name='title' placeholder="Enter title"><br>
    <input type='text' name='content' placeholder="Enter content"><br> --}}

    {{-- <input type="submit" name="submit"> --}}

{!! Form::close() !!}

@if (count($errors)>0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)

                <li>{{ $error }}</li>
            
            @endforeach
        </ul>
        
        
    </div>    
@endif
@endsection