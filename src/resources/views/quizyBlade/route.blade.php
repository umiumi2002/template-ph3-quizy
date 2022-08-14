<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/css/quizy.css') }}">
    <title>quizy</title>
</head>

<body>
  <div class="question">
      <a href="{{ route('quizy', ['id' => 1]) }}">東京の難読地名クイズ</a>
      <a href="{{ route('quizy', ['id' => 2]) }}">広島の難読地名クイズ</a>
         {{-- ↑localhostは自分だけ、公開したときは通用しない --}}
  </div>
</body>         