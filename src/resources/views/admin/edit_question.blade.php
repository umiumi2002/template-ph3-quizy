@extends('layouts.app')

@section('content')
    <h1>設問編集画面</h1>
    <div class="form-group">
        <label for="name">{{ __('設問編集') }}<span class="badge badge-danger ml-2">{{ __('必須') }}</span></label>
        {{-- <input type="text" name="order_number" placeholder="数字を入力してください"  class="form-control"> --}}
        {{-- <input type="text" class="form-control" name="name" id="name"> --}}
    </div>
    <div class="d-flex justify-content-between pt-3">
        <a href="{{ route('admin.question', ['id' => $question->prefecture_id]) }}" class="btn btn-outline-secondary"
            role="button">
            <i class="fa fa-reply mr-1" aria-hidden="true"></i>{{ __('一覧画面へ') }}
        </a>
        <form action="{{ route('admin.update.question', ['id' => $question->id]) }}" method="POST" enctype="multipart/form-data">
            {{-- 第一引数,第二引数：name,URLに渡す変数(/id) --}}
            @csrf
            <img src="{{ asset('storage/temp/' . $question->image) }}" alt="" width="15%">
            <input type="file" name="image">
            <input type="hidden" name="prefecture_id" value="{{ $question->prefecture_id }}">
            <input type="submit" value="更新" class="btn btn-success">
        </form>
    @endsection
