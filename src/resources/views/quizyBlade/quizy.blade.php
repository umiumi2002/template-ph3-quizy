{{-- {{ dd($prefecture) }} --}}
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
        @foreach ($prefecture->questions as $question)
            {{-- 1にしたら東京のものだけ、2にしたら広島のものだけ --}}
            {{-- 矢印の右は＄をとる --}}
            <h2 class="question">{{ $loop->iteration }}.この地名は何と読む?</h2>
            <img class="question__img" src="{{ asset('img/' . $question->image) }}" alt="">
            <ul class="question__lists">
                @foreach ($question->choices as $choice)
                    {{-- where(フィールド名、値) choicesのquestion_id(1,2,3...)と自動生成されるquestionのidが一致する --}}
                    <div class="question__list question__list_{{ $choice->question_id }}_{{ $choice->id }} question__list_{{ $choice->question_id }}"
                        onclick="check( {{ $choice->question_id }} , {{ $choice->id }} , {{ $choice->valid }} )">
                        {{ $choice->name }}
                    </div>
 
                @endforeach
            </ul>
            <div class="question__answer question__answer_{{ $choice->question_id }}">
                <p class="question__answer__text"></p>
                <p class="question__answer__text__choice">
                  正解は「
           
                  」です！
                </p>
              </div>
              {{-- うえ --}}
              {{-- $choices_corrects =  "SELECT * FROM choices WHERE prefecture_id = $id AND question_id = $i AND correct = 1";
              // 都道府県番号と問題番号と正解番号が一致している時
              $corrects = $db->query($choices_corrects)->fetchAll(PDO::FETCH_ASSOC | PDO::FETCH_UNIQUE); --}}
      
    
        @endforeach
        {{-- <!-- <div class="box" id="resultbox1">
          <p class="correctbox">正解！</p>
          <br>正解は「たかなわ」です！
      </div>
      <div class="box" id="resultbox2">
          <p class="incorrectbox">不正解！</p>
          <br>正解は「たかなわ」です！
      </div> --}}

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="{{ asset('/js/quizy.js') }}"></script>



</body>

</html>
