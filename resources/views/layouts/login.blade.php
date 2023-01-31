<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title></title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
    <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
    <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
    <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="画像のURL" />
    <!--OGPタグ/twitterカード-->
</head>
<body>
    <header>
        <div id = "head">
            <div class="header">
                <h1><a  href="/top" class="logo"><img src="{{ asset('images/main_logo.png') }}"></a></h1>
                <div id="right">
                    <div id="accordion">
                        <p class="accordion-username">{{ Auth::user()->username }}さん</p>
                        <img class="icon" src="{{ asset('images/' . Auth::user()->images) }}" alt="{{ Auth::user()->images }}">
                    <div>
                </div>
            </div>
        </div>
    </header>

     <nav class="g-navi">
        <ul class="menu">
            <li><a href="/top">ホーム</a></li>
            <li><a href="/profile">プロフィール</a></li>
            <li><a href="/logout">ログアウト</a></li>
        </ul>
    </nav>

    <div id="row">
        <div id="container">
            @yield('content')
        </div >
        <div id="side-bar">
            <div id="confirm">
                <p class="sb-name">{{ Auth::user()->username }}さんの</p>
                    <div class="sb-block">
                        <p class="sb-name">フォロー数</p>
                        @php
                            $follow_count = DB::table('follows')
                                ->where('follower', Auth::id())
                                ->count();
                        @endphp
                        <p class="sb-count">{{ $follow_count }}名</p>
                    </div>
                    <p class="sb-btn"><a href="/follow-list" class="list-button">フォローリスト</a></p>
                    <div class="sb-block">
                        <p class="sb-name">フォロワー数</p>
                        @php
                            $follower_count = DB::table('follows')
                            ->where('follow', Auth::id())
                                ->count();
                        @endphp
                        <p class="sb-count">{{ $follower_count }}名</p>
                    </div>
                    <p class="sb-btn"><a href="follower-list" class="list-button">フォロワーリスト</a></p>
            </div>
            <p class="sb-btn search"><a href="/search" class="list-button">ユーザー検索</a></p>
        </div>
    </div>
    <footer>
    </footer>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script src="./js/script.js"></script>
</body>
</html>
