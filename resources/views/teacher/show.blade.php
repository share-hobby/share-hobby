<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post->title }} の詳細</title>
    <!-- 外部CSSファイルのリンク -->
    <link rel="stylesheet" href="{{ asset('css/post_detail.css') }}">
</head>
<body>
    <div class="container">
        <h1>{{ $post->title }} の詳細</h1>
        
        <!-- 投稿の本文 -->
        <div class="post-body">
            <p>{{ $post->body }}</p>
        </div>
        
        <!-- 投稿に画像がある場合 -->
        @if($post->image)
            <div class="post-image">
                <img src="{{ asset('storage/' . $post->image) }}" alt="投稿画像">
            </div>
        @endif

        <!-- 作成日時と投稿者 -->
        <div class="post-meta">
            <p><strong>作成日時:</strong> {{ $post->created_at->format('Y-m-d H:i') }}</p>
            <p><strong>投稿者:</strong> {{ $post->user->name }}</p>
        </div>

        <!-- 投稿者がログインユーザーと一致する場合のみ編集・削除ボタンを表示 -->
        @if($canEditOrDelete)
            <div class="post-actions">
                <a href="{{ route('posts.edit', $post->id) }}" class="btn-edit">編集</a>
                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-delete">削除</button>
                </form>
            </div>
        @endif

        <!-- 戻るボタン -->
        <a href="{{ route('teacher.home') }}" class="btn-back">戻る</a>
    </div>
</body>
</html>
