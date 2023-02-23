@extends('layouts.login')

@section('content')
  <div id="list-container">
    <h1>Follow list</h1>
      <div class="list-container">
        @foreach($follow_posts as $follow_post)
          <a href="/users/{{ $follow_post->uid }}/profile"><img class="list-icon icon" src="{{ asset('storage/images/' . $follow_post->images) }}"></a>
        @endforeach
      </div>
  </div>

@foreach($follow_posts as $follow_post)
  @if(Auth::user()->id != $follow_post->user_id)
    <div id="post-container">
      <div class="user-block">
        <a href="/users/{{ $follow_post->user_id }}/profile">
          <img class="user-block-icon icon" src="{{ asset('storage/images/' . $follow_post->images) }}">
        </a>
        <p class="user-block-username">{{ $follow_post->username }}</p>
        <p class="user-block-time">{{ $follow_post->updated_at }}</p>
      </div>
      <div class="post-block">
        <p>{{ $follow_post->posts }}</p>
      </div>
    </div>
  @endif
@endforeach
@endsection
