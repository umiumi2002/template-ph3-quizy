{{-- {{ dd(phpinfo()) }} --}}
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
        <!-- レイアウト、ループを知る -->
        <!-- チャプター5：マイグレーション（テーブル創る）とシーだーの仕組み（ダミーデータ） -->
        <!-- 6が大事 -->
        <h1>{{ $prefecture->name }}</h1>
        @foreach ($questions->$questions as $question)
            {{-- 1にしたら東京のものだけ、2にしたら広島のものだけ --}}
            <h2 class="question">{{ $loop->iteration }}.この地名は何と読む?</h2>
            <img class="question__img" src="{{ asset('img/' . $question->image) }}" alt="">
            <ul class="question__lists">
              @foreach ($question -> $choices as $choice)
              {{-- where(フィールド名、値) choicesのquestion_id(1,2,3...)と自動生成されるquestionのidが一致する --}}
                <div class="question__list" id="correct">
                    {{ $choice -> name }}
                </div>
                {{-- <div class="question__list" id="incorrect1">
                    {{ $item->name }}
                </div>
                <div class="question__list" id="incorrect2">
                    {{ $item->name }}
                </div> --}}
              @endforeach  
            </ul>
            {{-- <div class="box" id="resultbox1">
                <p class="correctbox">正解！</p>
                <br>正解は「{{ $item->name }}」です！
            </div> --}}
        @endforeach
        {{-- <!-- <div class="box" id="resultbox1">
          <p class="correctbox">正解！</p>
          <br>正解は「たかなわ」です！
      </div>
      <div class="box" id="resultbox2">
          <p class="incorrectbox">不正解！</p>
          <br>正解は「たかなわ」です！
      </div> --}}


        <script src="{{ asset('/js/quizy.js') }}"></script>



</body>

</html>
