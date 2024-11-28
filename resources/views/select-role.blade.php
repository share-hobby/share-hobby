<!-- resources/views/select-role.blade.php -->
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン選択</title>
</head>
<body>
    <h1>役割を選んでください</h1>

    <!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン選択</title>
</head>
<body>
    <h1>ログインする役割を選んでください</h1>

    <!-- 生徒の場合 -->
    <button onclick="location.href='{{ url('/user/login') }}'">生徒はこちら</button>

    <!-- 講師の場合 -->
    <button onclick="location.href='{{ url('/admin/login') }}'">講師はこちら</button>

</body>
</html>

</body>
</html>
