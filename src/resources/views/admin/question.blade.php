@extends('layouts.app')
@section('content')
    <div class="">
        <div class="col-md-8">
            <h1 class="">設問を管理</h1>
            <button onclick="location.href='{{ route('admin.create.question', ['id' => $prefecture->id]) }}' "
                class="btn btn-success">追加</button>
            {{-- <form action="{{ route('admin.sort.question') }}" method="post"> --}}
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>設問id</th>
                        <th>prefecture_id</th>
                        <th>order_number</th>
                        <th>画像</th>
                        <th>詳細</th>
                        <th>編集</th>
                        <th>削除</th>
                    </tr>
                </thead>
                <tbody class="sortable">
                    @foreach ($questions as $question)
                        <tr>
                            <td>{{ $question->id }}</td>
                            <td>{{ $question->prefecture_id }}</td>

                            <form method="POST">
                                @csrf
                                <fieldset>
                                <td>
                                    <input value="{{ $question->id }}" name="question_id" hidden>
                                    <input value="{{ $question->order_number }}" name="order_number">
                                    <div class="d-flex justify-content-between pt-3">
                                        <button type="submit" class="btn btn-success">
                                            {{ __('更新') }}
                                        </button>
                                    </div>
                                </td>
                            </fieldset>
                            </form>

                            <td><img src="{{ asset('image/' . $question->image) }}" alt=""></td>
                            <td><a href="{{ route('admin.choice',['prefecture_id' => $prefecture->id,'question_id' => $question->id]) }}"
                                {{-- //$idは設問のコントローラのidと連携 --}}
                                        class="btn btn-primary">選択肢画面</a></td>
                            <td><a href="{{ route('admin.edit.question', ['id' => $question->id]) }}"
                                    class="btn btn-info">編集</a>
                            </td>
                            <td>
                                <form action="{{ route('admin.destroy.question', ['id' => $question->id]) }}"
                                    method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">削除</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
    <script src="{{ asset('js/quizy.js') }}"></script>
@endsection
