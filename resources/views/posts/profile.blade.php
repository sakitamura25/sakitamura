@extends('layouts.login')

@section('content')

  {{ Form::open(['url' => '/profile', 'method' => 'post', 'enctype' => 'multipart/form-data']) }}
  {{ Form::hidden('id', $user->id) }}
<div id="posts-profile-container">
  <p>
    <img class="posts-profile-icon icon" src="{{ asset('images/' . $user->images) }}" alt="{{ $user->images }}">
  </p>
  <div class="posts-profile-block">
    <div class="posts-profile-form">
      {{ Form::label('username', 'UserName', ['class' => 'posts-profile-name']) }}
      {{ Form::input('username', 'username', $user->username, ['class' => 'posts-profile-text']) }}
    </div>

    <div class="posts-profile-form">
      {{ Form::label('mail', 'MailAddress', ['class' => 'posts-profile-name']) }}
      {{ Form::input('mail', 'mail', $user->mail, ['class' => 'posts-profile-text']) }}
    </div>

    <div class="posts-profile-form">
      {{ Form::label('password', 'Password', ['class' => 'posts-profile-name']) }}
      {{ Form::input('password', 'password', $user->password, ['class' => 'posts-profile-text', 'readonly']) }}
    </div>

    <div class="posts-profile-form">
      {{ Form::label('newPassword', 'new Password', ['class' => 'posts-profile-name']) }}
      {{ Form::password('newPassword', ['class' => 'posts-profile-text']) }}
    </div>

    <div class="posts-profile-form">
      {{ Form::label('bio', 'Bio', ['class' => 'posts-profile-name']) }}
      {{ Form::input('text','bio', $user->bio, ['class' => 'posts-profile-text']) }}
    </div>

    <div class="posts-profile-form">
      {{ Form::label('image', 'Icon Image', ['class' => 'posts-profile-name']) }}
      {{ Form::file('image', ['class' => 'posts-profile-text-img']) }}
    </div>
    <div class="posts-profile-button-block">
      {{ Form::submit('更新', ['class' => 'posts-profile-button btn']) }}
    </div>
  </div>
</div>
  {{ Form::close() }}

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @endsection
