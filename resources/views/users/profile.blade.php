@extends('layouts.login')

@section('content')
  <div id="users-profile-container">
    <p>
      <img class="users-profile-icon icon" src="{{ asset('images/' . $users->images) }}", alt="{{ $users->images }}">
    </p>
    <div class="users-profile-block1">
      <p class="name">Name</p>
      <p class="bio">Bio</p>
    </div>
    <div class="users-profile-block2">
      <p class="name-text">{{ $users->username }}</p>
      <p class="name-text">{{ $users->bio }}</p>
    </div>
      @if($follows->contains($users->id))
        {{ Form::open(['url' => '/unfollow', 'method' => 'post']) }}
        {{ Form::hidden('id', $users->id) }}
        {{ Form::button('フォローをはずす', ['class' => 'btn unfollow-button', 'type' => 'submit']) }}
        {{ Form::close() }}
      @else
        {{ Form::open(['url' => '/follow', 'method' => 'post']) }}
        {{ Form::hidden('id', $users->id) }}
        {{ Form::button('フォローする', ['class' => 'btn follow-button', 'type' => 'submit']) }}
        {{ Form::close() }}
      @endif
  </div>

@foreach($posts as $post)
  <div id="post-container">
    <div class="user-block">
      <p>
        <img class="user-block-icon icon" src="{{ asset('images/' . $post->images) }}", alt="{{ $post->images }}">
      </p>
      <p class="user-block-username"> {{ $post->username }}</p>
      <p class="user-block-time">{{ $post->updated_at }}</p>
    </div>
    <div class="post-block">
      <p>{{ $post->posts }}</p>
    </div>
  </div>
@endforeach

@endsection
