<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>シェアホビ</title>
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}"> <!-- CSSファイルをリンク -->
</head>
<body>
    <div class="container">
        <h1>最初の画面。ここで登録かログインが選べる。</h1>
        <a href="{{ route('register') }}" class="btn">新規登録</a>
        <a href="{{ route('login') }}" class="btn">ログイン</a>
    </div>
</body>
</html>
