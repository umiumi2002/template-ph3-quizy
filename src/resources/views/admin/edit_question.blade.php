@extends('layouts.app')

@section('content')
    <h1>設問編集画面</h1>
    <form action="{{ route('admin.update.question', ['id' => $question->id]) }}" method="POST" enctype="multipart/form-data">
        {{-- 第一引数,第二引数：name,URLに渡す変数(/id) --}}
        @csrf
        {{-- @method('patch') --}}
        <fieldset>
            <div class="form-group">
                <label for="name">{{ __('設問編集') }}<span
                        class="badge badge-danger ml-2">{{ __('必須') }}</span></label>
                        {{-- <input type="text" name="order_number" placeholder="数字を入力してください"  class="form-control"> --}}
                {{-- <input type="text" class="form-control" name="name" id="name"> --}}

                <div>
                  <input type="file" name="image" class="mt-3 mb-5">
                </div>
                <input type="hidden" name="prefecture_id" value="{{ $question->prefecture_id }}">
            </div>
            <div class="d-flex justify-content-between pt-3">
                <a href="{{ route('admin.question', ['id' => $question->prefecture_id]) }}" class="btn btn-outline-secondary"
                    role="button">
                    <i class="fa fa-reply mr-1" aria-hidden="true"></i>{{ __('一覧画面へ') }}
                </a>
                <button type="submit" class="btn btn-success">
                    {{ __('更新') }}
                </button>
            </div>
        </fieldset>
    </form>
@endsection
