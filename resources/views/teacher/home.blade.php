<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>講師ホーム</title>
    <!-- 外部CSSファイルのリンク -->
    <link rel="stylesheet" href="{{ asset('css/teacher_home.css') }}">
</head>

<body>
    <div class="container">
        <h4 class = "page-name">講師</h4>
        <h1>ようこそ、{{ $user->name }} さん</h1>
        <div class="btn-group">
            <a href="{{ route('posts.create') }}" class="btn-create">投稿作成</a>
            <a href="{{ route('teacher.chat') }}" class="btn-chat">チャット画面へ</a>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-logout">ログアウト</button>
            </form>
        </div>



        <!-- 投稿一覧セクション -->
        <h2>投稿一覧</h2>

        @if($posts->isEmpty())
        <p>投稿はまだありません。</p>
        @else
        <ul>
            @foreach($posts as $post)
            <li class="post-item">
                <!-- 投稿全体をリンクで囲む -->
                <a href="{{ route('teacher.posts.show', $post->id) }}" class="post-link">
                    <div class="post-title">
                        <h3>{{ $post->title }}</h3>
                    </div>

                    <div class="post-image">
                        @if($post->image)
                        <img src="{{ asset('storage/' . $post->image) }}" alt="投稿画像">
                        @endif
                    </div>
                    <div class="post-date">
                        <p>作成日時: {{ $post->created_at->format('Y-m-d H:i') }}</p>
                        <p>投稿者: {{ $post->user->name }}</p>
                    </div>
                </a>
            </li>
            @endforeach
        </ul>
        @endif
    </div>
</body>

</html>