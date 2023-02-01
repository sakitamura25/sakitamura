@extends('layouts.login')

@section('content')
<!-- <h2>機能を実装していきましょう。</h2> -->
  {{ Form::open(['url' => 'post/create', 'method' => 'post']) }}
<div id="post">
  <img class="form-icon icon" src="{{ asset('images/' . Auth::user()->images) }}" alt="{{ Auth::user()->images }}">
  {{ Form::input('text', 'newPost', null, ['required', 'max:150', 'placeholder' => '何をつぶやこうか…？', 'class' => 'post-text']) }}

  {{ Form::button('<img src="images/post.png" alt="送信">', ['class' => 'send-btn', 'type' => 'submit']) }}

  {{ Form::close() }}
</div>

@foreach($posts as $post)
<div id="post-container">
  <div class="user-block">
    @if(Auth::user()->id != $post->user_id)
      <a href="/users/{{ $post->user_id }}/profile">
        <img class="user-block-icon icon" src="{{ asset('images/' . $post->images) }}", alt="{{ $post->images }}">
      </a>
    @elseif(Auth::user()->id == $post->user_id)
      <p>
        <img class="user-block-icon icon" src="{{ asset('images/' . $post->images) }}", alt="{{ $post->images }}">
      </p>
    @endif
      <p class="user-block-username">{{ $post->username }}</p>
  </div>
  <div class="post-block">
      <p>{{ $post->posts }}</p>
  </div>
  <div class="btn-block">
    @if(Auth::user()->id == $post->user_id)
    <a href="" class="modal-open"><img src="images/edit.png" alt="編集"></a>
    <!-- モーダル画面 -->
      <div id="modal-container">
        <div class="modal-body">
          {{ Form::open(['url' => '/post/update', 'method' => 'post']) }}
          {{ Form::hidden('id', $post->id) }}
          {{ Form::input('text', 'upPosts', $post->posts, ['required', 'max:200']) }}
          {{ Form::button('<img src="images/edit.png" alt="編集">', ['class' => 'modal-btn', 'type' => 'submit']) }}
          {{ Form::close() }}
        </div>
      </div>
    <td><a href="/post/{{ $post->id }}/delete" onclick="return confirm('こちらのつぶやきを削除します。よろしいでしょうか？')"><img src="images/trash_h.png" alt="削除"></a></td>
    @endif
  </div>
</div>
 @endforeach


@endsection
