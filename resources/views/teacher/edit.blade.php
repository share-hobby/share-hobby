<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post->title }} の編集</title>
    <!-- 外部CSSファイルのリンク -->
    <link rel="stylesheet" href="{{ asset('css/post_edit.css') }}">
</head>
<body>
    <div class="container">
        <h1>投稿の編集</h1>

        <!-- エラーメッセージの表示 -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') <!-- HTTP PUTメソッドを使用 -->
            
            <div class="form-group">
                <label for="title">タイトル</label>
                <input type="text" name="title" id="title" value="{{ old('title', $post->title) }}" required class="form-control">
            </div>

            <div class="form-group">
                <label for="body">本文</label>
                <textarea name="body" id="body" rows="5" required class="form-control">{{ old('body', $post->body) }}</textarea>
            </div>

            <div class="form-group">
                <label for="image">画像 (任意)</label>
                <input type="file" name="image" id="image" class="form-control">
                @if ($post->image)
                    <p>現在の画像: <img src="{{ asset('storage/' . $post->image) }}" alt="現在の投稿画像" style="width: 100px;"></p>
                @endif
            </div>

            <button type="submit" class="btn btn-primary">更新する</button>
        </form>

        <a href="{{ route('teacher.posts.show', $post->id) }}" class="btn btn-secondary">戻る</a>
    </div>
</body>
</html>
