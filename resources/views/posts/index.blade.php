@extends('layouts.login')

@section('content')
<!-- <h2>機能を実装していきましょう。</h2> -->

{!! Form::open(['url' => 'post/create', 'method' => 'post']) !!}

{!! Form::input('text', 'newPost', null, ['required', 'max:150', 'placeholder' => '何をつぶやこうか…？']) !!}

{!! Form::button('<img src="images/post.png" alt="送信">', ['class' => 'btn', 'type' => 'submit']) !!}

{!! Form::close() !!}

  @foreach($posts as $post)
    {{ Auth::user()->username }}
    {{ $posts->posts }}
  @endforeach

@endsection
