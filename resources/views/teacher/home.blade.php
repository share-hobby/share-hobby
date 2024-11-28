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
        <h1>ようこそ、{{ $user->name }} さん</h1>
        <a href="{{ route('posts.create') }}" class="btn-create">投稿作成</a>
        <p>あなたは講師です</p>

        <!-- 投稿一覧セクション -->
        <h2>投稿一覧</h2>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-logout">ログアウト</button>
        </form>
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
