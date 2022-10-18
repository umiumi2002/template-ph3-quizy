@extends('layouts.app')

@section('content')
<h1>問題タイトルを登録</h1>


<form action="{{ route('admin.store') }}" method="POST">
  @csrf
  <label for="name">{{ __('問題タイトル') }}</label>
  <input type="text" class="form-control" name="name" id="name">
  <div class="d-flex justify-content-between pt-3">
    <a href="{{ route('admin.index') }}" class="btn btn-outline-secondary" role="button">
        <i class="fa fa-reply mr-1" aria-hidden="true"></i>{{ __('一覧画面へ') }}
    </a>
    <button type="submit" class="btn btn-success">
        {{ __('登録') }}
    </button>
</div>

</form>
@endsection