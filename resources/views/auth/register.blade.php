@extends('layouts.logout')

@section('content')

<div id="register">
	{{ Form::open(['url' => '/register', 'method' => 'post']) }}

	<div class="form">
		<h2 class="top-copy">新規ユーザー登録</h2>

		<div class="register-block">
			{{ Form::label('username', 'UserName', ['class' => 'register-text']) }}
			{{ Form::text('username',null,['class' => 'register-form']) }}
		</div>

		<div class="register-block">
			{{ Form::label('mail', 'MailAddress', ['class' => 'register-text']) }}
			{{ Form::text('mail',null,['class' => 'register-form']) }}
		</div>

		<div class="register-block">
			{{ Form::label('password', 'Password', ['class' => 'register-text']) }}
			{{ Form::password('password',['class' => 'register-form']) }}
		</div>

		<div class="register-block">
			{{ Form::label('password-confirm', 'PasswordConfirm', ['class' => 'register-text']) }}
			{{ Form::password('password-confirm',['class' => 'register-form']) }}
		</div>

			{{ Form::submit('REGISTER', ['class' => 'register-button']) }}
	</div>

		<p class="btn"><a href="/login" class="to-login-copy">ログイン画面へ戻る</a></p>

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

</div>

@endsection
