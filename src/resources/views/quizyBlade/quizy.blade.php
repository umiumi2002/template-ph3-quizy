<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href = "{{ asset('/css/quizy.css') }}">
    <title>quizy</title>
</head>
<body>
    
 <div class="question" >
    <!-- レイアウト、ループを知る -->
    <!-- チャプター5：マイグレーション（テーブル創る）とシーだーの仕組み（ダミーデータ） -->
    <!-- 6が大事 -->
      @foreach($choices[$id] as $choice)
      <h1 class = "question">{{ $loop->iteration }}.この地名は何と読む?</h1>
      <img class="question__img" src="{{ asset('/img/{$choices[$id]}_{$loop->iteration}') }}.png" alt="">
      <ul class="question__lists">
      <div class="question__list" id="correct" >
      {{ $choice[0] }}
      </div>
      <div class="question__list" id="incorrect1">
      {{ $choice[1] }}
      </div>
      <div class="question__list" id="incorrect2">
      {{ $choice[2] }}
      </div>
      </ul>
      @endforeach
      <!-- <div class="box" id="resultbox1">
          <p class="correctbox">正解！</p>
          <br>正解は「たかなわ」です！
      </div>
      <div class="box" id="resultbox2">
          <p class="incorrectbox">不正解！</p>
          <br>正解は「たかなわ」です！
      </div>

      <h1 class = "question">2.この地名は何と読む?</h1>
      <img src="https://d1khcm40x1j0f.cloudfront.net/quiz/512b8146e7661821c45dbb8fefedf731.png" alt="亀戸" class = "img">
      <div class="choice">
          かめと
      </div >
      <div class="choice">
          かめいど
      </div>
      <div class="choice">
          かめど
      </div> 
      <h1 class = "question">3.この地名は何と読む?</h1>
      <img src="https://d1khcm40x1j0f.cloudfront.net/quiz/ad4f8badd896f1a9b527c530ebf8ac7f.png" alt="麹町" class="img">
      <div class="choice">
          おかとまち
      </div >
      <div class="choice">
          こうじまち
      </div>
      <div class="choice">
          かゆまち
      </div>  -->
    </div> 

<script src="{{ aseet('/js/quizy.js') }}"></script>



</body>
</html>