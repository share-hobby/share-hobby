<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>投稿詳細</title>
    <link rel="stylesheet" href="{{ asset('css/post_detail.css') }}">
</head>

<body>
    <header>
        <nav>
            <a href="/">ホーム</a>
        </nav>
    </header>
 <!--<main>-->
        <div class="container">
            <h1>{{ $post->title }}</h1>
            <div class="post-body">
                <p>{{ $post->body }}</p>
            </div>

            <a href="{{ route('student.home') }}">投稿一覧に戻る</a>
        </div>
   <!--</main>-->

</body>

</html>