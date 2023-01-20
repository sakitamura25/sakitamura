@extends('layouts.login')

@section('content')

  @foreach($follower_lists as $follower_list)
    <img src="{{ asset('images/' . $follower_list->images) }}" alt="{{$follower_list->images }}">
  @endforeach

@endsection
