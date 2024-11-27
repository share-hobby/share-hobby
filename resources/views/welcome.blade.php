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
<!DOCTYPE html>
<head>
  <title>Pusher Test</title>
  <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
  <script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('384385a2fc14dd2c2178', {
      cluster: 'ap3'
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {
      alert(JSON.stringify(data));
    });
  </script>
</head>
<body>
  <h1>Pusher Test</h1>
  <p>
    Try publishing an event to channel <code>my-channel</code>
    with event name <code>my-event</code>.
  </p>
</body>