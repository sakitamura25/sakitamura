@extends('layouts.logout')

@section('content')

<div class="login">
  {!! Form::open(['url' => '/login', 'method' => 'post']) !!}

  <p class="welcome-copy">DAWNSNSへようこそ</p>

  <div class="login-form">
    <div class="login-block">
      {{ Form::label('mail', 'MailAddress', ['class' => 'login-text']) }}
      {{ Form::text('mail',null,['class' => 'login-mail']) }}
    </div>
    <div class="login-block">
      {{ Form::label('password', 'Password', ['class' => 'login-text']) }}
      {{ Form::password('password',['class' => 'login-password']) }}
    </div>
      {{ Form::submit('LOGIN', ['class' => 'login-button'])}}
  </div>

  <a href="/register" class="register-copy">新規ユーザーの方はこちら</a></p>

  {!! Form::close() !!}
</div>

@endsection
