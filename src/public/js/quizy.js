// ボタンのDOM要素を取得,クラス名で取得
//配列のとり方btnsを配列
// let container = document.getElementById('container');
// let btns = [];
// btns = container.getElementsByTagName('li');
// //htmlcollectionは配列じゃない⇒
// const Btns = Array.prototype.slice.call(btns);

/**
 * [description]
 */

//配列にする

/**
 * @param
 */

 /**
  * check関数 
  * @param  {Number} question_id 問題番号
  * @param  {Number} choice_id 選択肢番号
  * @param  {Number} valid 正解番号
  */
 function check (question_id, choice_id, valid) {
   if (valid === 1) {
     console.log('seikai');
     $('.question__list_'+ question_id + '_' + choice_id).addClass("succeeded");
     $('.question__answer_' + question_id).addClass("show");
     $(".question__list_" + question_id).addClass("cant_click");
     $(".question__answer__text_" + question_id).text("正解");
     $(".question__answer__text_" + question_id).removeClass("fail_answer_text");
   } else {
     $('.question__list_'+ question_id + '_' + choice_id).addClass("failed");
     $('.question__list_'+ question_id + '_' + 1).addClass("succeeded");
     $('.question__answer_' + question_id).addClass("show");
     $(".question__answer__text_" + question_id).text("不正解");
     $(".question__answer__text_"+ question_id).addClass("fail_answer_text");
     $(".question__list_" + question_id).addClass("cant_click");
 
   }
 };
 

//  ソート
//  $(function() {
//        $(".sortable").sortable();
//        $(".sortable").disableSelection();
//        $("#submit").click(function() {
//            var listIds = $(".sortable").sortable("toArray");
//            $("#list-ids").val(listIds);
//            $("form").submit();
//        });
//    });