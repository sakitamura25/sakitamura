@extends('layouts.login')

@section('content')

  @foreach($follow_lists as $follow_list)
    <img src="{{ asset('images/' . $follow_list->images) }}" alt="{{$follow_list->images }}">
  @endforeach

@endsection
