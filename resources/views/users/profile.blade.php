@extends('layouts.login')

@section('content')

    <img src="{{ asset('images/' . $users->images) }}", alt="{{ $users->images }}">
    {{ $users->username }}
    {{ $users->bio }}

      @if($follows->contains($users->id))
        {{ Form::open(['url' => '/unfollow', 'method' => 'post']) }}
        {{ Form::hidden('id', $users->id) }}
        {{ Form::button('フォローをはずす', ['class' => 'btn', 'type' => 'submit']) }}
        {{ Form::close() }}
      @else
        {{ Form::open(['url' => '/follow', 'method' => 'post']) }}
        {{ Form::hidden('id', $users->id) }}
        {{ Form::button('フォローする', ['class' => 'btn', 'type' => 'submit']) }}
        {{ Form::close() }}
      @endif


    @foreach($posts as $post)
      <img src="{{ asset('images/' . $post->images) }}", alt="{{ $post->images }}">
      {{ $post->username }}
      {{ $post->posts }}

    @endforeach

@endsection
