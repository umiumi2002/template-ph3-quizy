@extends('layouts.app')
@section('content')
    <div class="">
        <div class="col-md-8">
            <h1 class="">選択肢を管理</h1>
            {{-- <button onclick="location.href='{{ route('admin.create.question') }}' " class="btn btn-success">追加</button> --}}
            {{-- <form action="{{ route('admin.sort.question') }}" method="post"> --}}
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>選択肢タイトル</th>
                        <th>question_id</th>
                        <th>編集</th>
                        <th>削除</th>
                    </tr>
                </thead>
                    <tbody class="sortable">
                        @foreach ($choices as $choice)
                            <tr>
                                <td>{{ $choice->name }}</td>
                                <td>{{ $choice->question_id }}</td>
                                {{-- <td><a href="{{ route('question.edit', ['id' => $choice->id]) }}"
                                        class="btn btn-info">編集</a>
                                </td> --}}
                                <td>
                                    {{-- <form action="{{ route('question.destroy', ['id' => $choice->id]) }}"
                                        method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">削除</button>
                                    </form> --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
            </table>
            <input type="hidden" id="list-ids" name="list-ids" />
            <button id="submit">更新</button>
            </form>

        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
    <script src="{{ asset('js/quizy.js') }}"></script>
@endsection
