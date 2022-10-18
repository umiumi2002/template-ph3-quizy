@extends('layouts.app')

@section('content')
<div class="container small">
  <h1>設問を登録</h1>
  <form action="{{ route('admin.store.question') }}" method="POST">
  @csrf
    <fieldset>
        <div class="form-group">
            <label for="">{{ __('設問タイトル') }}<span class="badge badge-danger ml-2">{{ __('必須') }}</span></label>
            <input type="text" class="form-control" name="" id="">
        <div class="d-flex justify-content-between pt-3">
            <a href="{{ route('admin.question',['id' => $prefecture->id]) }}" class="btn btn-outline-secondary" role="button">
                <i class="fa fa-reply mr-1" aria-hidden="true"></i>{{ __('一覧画面へ') }}
            </a>
            <button type="submit" class="btn btn-success">
                {{ __('登録') }}
            </button>
        </div>
    </fieldset>
  </form>
</div>
@endsection