@extends('layouts.app')

@section('content')
    <a href="/BlogApp/public/posts" class="btn btn-primary" role = "button">Go Back</a>
    <h1>{{$post->title}}</h1>
    
    <div>
        {{$post->body}}
    </div>
    <hr>
    <small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
    <hr>
    @if(!Auth::guest())
        @if(Auth::user()->id == $post->user_id)
        <a href="/BlogApp/public/posts/{{$post->id}}/edit" class = "btn btn-primary">Edit</a>
        {!!Form::open(['action' =>['App\Http\Controllers\PostsController@destroy', $post->id], 'method' =>'POST', 'class'=>'pull-right'])!!}
          {{Form::hidden('_method', 'DELETE')}}
          {{Form::submit('Delete', ['class'=>'btn btn-danger'])}}
        {!!Form::close()!!}
        @endif
    @endif
@endsection