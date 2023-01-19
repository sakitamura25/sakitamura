@extends('layouts.login')

@section('content')
<!-- <h2>機能を実装していきましょう。</h2> -->

{{ Form::open(['url' => 'post/create', 'method' => 'post']) }}

{{ Form::input('text', 'newPost', null, ['required', 'max:150', 'placeholder' => '何をつぶやこうか…？']) }}

{{ Form::button('<img src="images/post.png" alt="送信">', ['class' => 'btn', 'type' => 'submit']) }}

{{ Form::close() }}

  @foreach($posts as $post)
  <tr>
    <img src="{{ asset('images/' . $post->images) }}", alt="{{ $post->images }}">
    <td>{{ $post->username }}</td>
    <td>{{ $post->posts }}</td><br>

    @if(Auth::user()->id == $post->user_id)
    <td><a href="" data-target="modal"><img src="images/edit.png" alt="編集"></a></td>

    <!-- モーダル画面 -->
        <div id="modal">
      {!! Form::open(['url' => '/post/update', 'method' => 'post']) !!}
      {!! Form::hidden('id', $post->id) !!}
      {!! Form::input('text', 'upPosts', $post->posts, ['required', 'max:200']) !!}
      <button type="submit"><img src="images/edit.png" alt="編集"></button>
      {!! Form::close() !!}
    </div>


    <td><a href="/post/{{ $post->id }}/delete" onclick="return confirm('こちらのつぶやきを削除します。よろしいでしょうか？')"><img src="images/trash_h.png" alt="削除"></a></td>
    @endif
  </tr>
  @endforeach

@endsection
