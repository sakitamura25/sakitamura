@extends('layouts.logout')

@section('content')

<div id="clear">
  <div class="added-copy">
    @if(session('username'))
      <p class="added-username"> {{ session('username') }}さん</p>
    @endif
    <p>ようこそ！DAWNSNSへ！</p>
  </div>
  <div class="added-text">
    <p>ユーザー登録が完了しました。</p>
    <p>さっそく、ログインをしてみましょう。</p>
  </div>

  <p class="added-btn"><a href="/login", class="to-login-btn">ログイン画面へ</a></p>
</div>

@endsection
