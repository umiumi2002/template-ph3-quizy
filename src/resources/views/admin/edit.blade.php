@extends('layouts.app')

@section('content')

<h1>編集画面</h1>
<form action="{{ route('admin.update', ['id'=>$prefecture->id]) }}" method="POST">
  @csrf
    <fieldset>
      <div class="form-group">
        <label for="name">{{ __('問題タイトル') }}<span class="badge badge-danger ml-2">{{ __('必須') }}</span></label>
        <input type="text" class="form-control" name="name" id="name">
      </div>
      <div class="d-flex justify-content-between pt-3">
        <a href="{{ route('admin.index') }}" class="btn btn-outline-secondary" role="button">
            <i class="fa fa-reply mr-1" aria-hidden="true"></i>{{ __('一覧画面へ') }}
        </a>
        <button type="submit" class="btn btn-success">
            {{ __('更新') }}
        </button>
      </div>
    </fieldset>
  </form>

@endsection

@push('scripts')
    {{-- タイトル編集js --}}
    <script src="{{ asset('js/sortable.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
@endpush