@extends('layouts.login')

@section('content')

{{ Form::open(['url' => '/profile', 'method' => 'post']) }}

{{ Form::hidden('id', $user->id) }}

<p>
{{ Form::label('UserName') }}
{{ Form::input('text', 'upUserName', $user->username, ['required']) }}</p>

<p>
{{ Form::label('MailAddress') }}
{{ Form::input('mail', 'upMail', $user->mail, ['required']) }}</p>

<p>
{{ Form::label('Password') }}
{{ Form::input('password', '', $user->password, ['readonly']) }}</p>

<p>
{{ Form::label('new Password') }}
{{ Form::password('newPassword') }}</p>

<p>
{{ Form::label('Bio') }}
{{ Form::input('text', 'bio', $user->bio) }}</p>

<p>
{{ Form::label('Icon Image') }}
{{ Form::file('images') }}</p>

<button type="submit">更新</button>
{{ Form::close() }}

@endsection
