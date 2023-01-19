@extends('layouts.login')

@section('content')

<div>
  {{ Form::open(['url' => '/search', 'method' => 'post']) }}
  {{ Form::input('text', 'keyword', $keyword, ['placeholder' => 'ユーザー名']) }}
  {{ Form::button('<i class="fas fa-paper-plane" aria-hidden="true" alt="検索"></i>', ['class' => 'btn', 'type' => 'submit']) }}
  {{ Form::close()}}
</div>


@foreach($users as $user)
<tr>
  <li>{{ $user->username }}</li>
    @if($follows->contains($user->id))
      {{ Form::open(['url' => '/unfollow', 'method' => 'post']) }}
      {{ Form::hidden('id', $user->id) }}
      {{ Form::button('フォローをはずす', ['class' => 'btn', 'type' => 'submit']) }}
      {{ Form::close() }}

    @else
      {{ Form::open(['url' => '/follow', 'method' => 'post']) }}
      {{ Form::hidden('id', $user->id) }}
      {{ Form::button('フォローする', ['class' => 'btn', 'type' => 'submit']) }}
      {{ Form::close() }}

    @endif
</tr>
@endforeach

@endsection
