@extends('layouts.logout')

@section('content')

<div id="login">
  {{ Form::open(['url' => '/login', 'method' => 'post']) }}

  <div class="form">
    <h2 class="top-copy">DAWNSNSへようこそ</h2>
    <div class="login-block">
      {{ Form::label('mail', 'MailAddress', ['class' => 'login-text']) }}
      {{ Form::text('mail',null,['class' => 'login-form']) }}
    </div>
    <div class="login-block">
      {{ Form::label('password', 'Password', ['class' => 'login-text']) }}
      {{ Form::password('password',['class' => 'login-form']) }}
    </div>
      {{ Form::submit('LOGIN', ['class' => 'login-button'])}}
  </div>

  <p class="btn"><a href="/register" class="register-copy">新規ユーザーの方はこちら</a></p>

  {{ Form::close() }}
</div>

@endsection
