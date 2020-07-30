@extends('layouts.app')


@section('content')

<h1>Edit Post</h1>

{!! Form::model($post,['method'=>'PATCH','action'=>['PostController@update',$post->id]]) !!}
    @csrf
    {!! Form::label('title','Title:') !!}
    {!! Form::text('title',null,['class'=>'form-control']) !!}

    {!! Form::submit('Update Post',['class'=>'btn btn-primary']) !!}
   

{!! Form::close() !!}

{!! Form::open(['method'=>'DELETE','action'=>['PostController@destroy',$post->id]]) !!}
    @csrf
   
    {!! Form::submit('Delete Post',['class'=>'btn btn-danger']) !!}
{!! Form::close() !!}




@endsection