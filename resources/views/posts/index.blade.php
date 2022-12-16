@extends('layouts.login')

@section('content')
<h2>機能を実装していきましょう。</h2>

{!! Form::open(['url' => '', 'method' => 'post']) !!}

<img src="mages/dawn.png" alt="">

{{ Form::button('<img src="images/post.png" alt="送信">', ['class' => 'btn', 'type' => 'submit']) }}

{!! Form::close() !!}

@endsection
