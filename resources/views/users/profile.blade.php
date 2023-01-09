@extends('layouts.login')

@section('content')

{!! Form::open(['url' => '/profile', 'method' => 'post']) !!}

{!! Form::hidden('id, $user->id') !!}

{!! Form::label('UserName') !!}
{!! Form::input('text', 'upUserName', $user->username, ['required']) !!}

{!! Form::label('MailAddress') !!}
{!! Form::input('mail', 'upMail', $user->mail, ['required']) !!}

{!! Form::label('Password') !!}
{!! Form::input('password', '', $user->password, ['readonly']) !!}

{!! Form::label('new Password') !!}
{!! Form::password('newPassword') !!}

{!! Form::label('Bio') !!}
{!! Form::input('text', 'bio', $user->bio) !!}

{!! Form::label('Icon Image') !!}

<button type="submit">更新</button>
{!! Form::close() !!}

@endsection
