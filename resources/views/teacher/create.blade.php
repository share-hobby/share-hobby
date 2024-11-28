<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>投稿作成</title>
    <link rel="stylesheet" href="{{ asset('css/teacher_create.css') }}">
</head>

<body>
    <div class="container">
        <h1>投稿作成</h1>

        <!-- 投稿作成フォーム -->
        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="title">タイトル</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="body">本文</label>
                <textarea name="body" id="body" class="form-control" required></textarea>
            </div>

            <div class="form-group">
                <label for="zoomurl">Zoomリンク (任意)</label>
                <input type="url" name="zoomurl" id="zoomurl" class="form-control">
            </div>

            <div class="form-group">
                <label for="image">画像 (任意)</label>
                <input type="file" name="image" id="image" class="form-control">
            </div>
            <div class = "form-action">
                <button type="submit" class="btn-submit">投稿する</button>
            </div>
        </form>
    </div>
</body>

</html>