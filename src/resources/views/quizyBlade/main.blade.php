<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>地名クイズトップページ</title>
</head>
<body>
    <ul>
        @foreach($big_questions as $big_question)
        <form method="post">
            @csrf
            <li><a href="{{ url('/quiz/' . $big_question->id) }}">{{ $big_question->name }}の難読地名クイズ</a></li>
            <input type="submit" value="削除">
        </form>
        <a href="{{ url('/edit') }}">変更</a>
        @endforeach
    </ul>
    <a href="{{ url('/add') }}">追加</a>
</body>
</html>