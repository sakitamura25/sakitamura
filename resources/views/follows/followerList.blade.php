@extends('layouts.login')

@section('content')

  @foreach($follower_lists as $follower_list)
    <a href="/users/{{ $follower_list->id }}/profile"><img src="{{ asset('images/' . $follower_list->images) }}", alt="{{ $follower_list->images }}"></a>
  @endforeach

@endsection
