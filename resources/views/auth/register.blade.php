@extends('layouts.logout')

@section('content')

{!! Form::open(['url' => '/register', 'method' => 'post']) !!}

<h2>新規ユーザー登録</h2>

<p>UserName
{{ Form::label('ユーザー名') }}
{{ Form::text('username',null,['class' => 'input']) }}</p>

<p>MailAddress
{{ Form::label('メールアドレス') }}
{{ Form::text('mail',null,['class' => 'input']) }}</p>

<p>Password
{{ Form::label('パスワード') }}
{{ Form::password('password',null,['class' => 'input']) }}</p>

<p>Password confirm
{{ Form::label('パスワード確認') }}
{{ Form::password('password-confirm',null,['class' => 'input']) }}</p>

{{ Form::submit('REGISTER') }}

<p><a href="/login">ログイン画面へ戻る</a></p>

{!! Form::close() !!}

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
