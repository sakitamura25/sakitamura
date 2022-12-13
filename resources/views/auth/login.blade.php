@extends('layouts.logout')

@section('content')

{!! Form::open(['url' => '/login', 'method' => 'post']) !!}

<p>DAWNSNSへようこそ</p>

{{ Form::label('MailAddress') }}
{{ Form::text('mail',null,['class' => 'input']) }}
{{ Form::label('Password') }}
{{ Form::password('password',['class' => 'input']) }}

{{ Form::submit('ログイン') }}

<p><a href="/register">新規ユーザーの方はこちら</a></p>

{!! Form::close() !!}

@endsection
