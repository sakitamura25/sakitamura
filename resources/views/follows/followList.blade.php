@extends('layouts.login')

@section('content')

  @foreach($follow_lists as $follow_list)
    <a href="/users/{{ $follow_list->id }}/profile"><img src="{{ asset('images/' . $follow_list->images) }}", alt="{{ $follow_list->images }}"></a>
  @endforeach

@endsection
