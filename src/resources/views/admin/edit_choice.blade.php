@extends('layouts.app')

@section('content')

<h1>選択肢編集画面</h1>
<form action="{{ route('admin.update.choice', ['id'=>$choice->id]) }}" method="POST">
  {{-- 第一引数,第二引数：name,URLに渡す変数(/id) --}}
  @csrf
    <fieldset>
      <div class="form-group">
        <label for="name">{{ __('選択肢') }}<span class="badge badge-danger ml-2">{{ __('必須') }}</span></label>
        <input type="text" class="form-control" name="name" id="name">
      </div>
      <div class="d-flex justify-content-between pt-3">
        {{-- <a href="{{ route('admin.choice',['prefecture_id' => $prefecture->id,'question_id' => $question->id]) }}" class="btn btn-outline-secondary" role="button">
            <i class="fa fa-reply mr-1" aria-hidden="true"></i>{{ __('一覧画面へ') }}
        </a> --}}
        <button type="submit" class="btn btn-success">
            {{ __('更新') }}
        </button>
      </div>
    </fieldset>
  </form>

@endsection