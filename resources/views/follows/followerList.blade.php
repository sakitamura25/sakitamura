@extends('layouts.login')

@section('content')
  <div id="list-container">
    <h1>Follow list</h1>
      <div class="list-container">
        @foreach($follower_lists as $follower_list)
          <a href="/users/{{ $follower_list->id }}/profile"><img class="list-icon icon" src="{{ asset('images/' . $follower_list->images) }}", alt="{{ $follower_list->images }}"></a>
        @endforeach
      </div>
  </div>

@foreach($follower_posts as $follower_post)
  @if(Auth::user()->id != $follower_post->user_id)
    <div id="post-container">
      <div class="user-block">
        <a href="/users/{{ $follower_post->user_id }}/profile">
          <img class="user-block-icon icon" src="{{ asset('images/' . $follower_post->images) }}", alt="{{ $follower_post->images }}">
        </a>
        <p class="user-block-username">{{ $follower_post->username }}</p>
        <p class="user-block-time">{{ $follower_post->updated_at }}</p>
      </div>
    </div>
  @endif
@endforeach
@endsection
