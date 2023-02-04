@extends('layouts.login')

@section('content')
  <div id="search-container">
    {{ Form::open(['url' => '/search', 'method' => 'post']) }}
    {{ Form::input('text', 'keyword', $keyword, ['class' => 'search-form', 'placeholder' => 'ユーザー名']) }}
    {{ Form::button('<i class="fa-solid fa-magnifying-glass" aria-hidden="true" alt="検索"></i>', ['class' => 'search-button btn', 'type' => 'submit']) }}
    {{ Form::close()}}
  </div>

@foreach($users as $user)
  <div class="search-commit">
    <p>
      <img class="search-icon icon" src="{{ asset('images/' . $user->images) }}", alt="{{ $user->images }}">
    </p>
    <p class="search-name">{{ $user->username }}</p>
      @if($follows->contains($user->id))
        {{ Form::open(['url' => '/unfollow', 'method' => 'post']) }}
        {{ Form::hidden('id', $user->id) }}
        {{ Form::button('フォローをはずす', ['class' => 'search-unfollow-button btn', 'type' => 'submit']) }}
        {{ Form::close() }}
      @else
        {{ Form::open(['url' => '/follow', 'method' => 'post']) }}
        {{ Form::hidden('id', $user->id) }}
        {{ Form::button('フォローする', ['class' => 'search-follow-button btn', 'type' => 'submit']) }}
        {{ Form::close() }}
      @endif
  </div>
@endforeach

@endsection
