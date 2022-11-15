@extends('layouts.app')
@section('content')
    <div>
        <div class="col-md-8">
            <h1>問題タイトルを管理</h1>
            <button onclick="location.href='{{ route('admin.create') }}' " class="btn btn-success">追加</button>
            <button onclick="location.href='{{ route('admin.sort.prefecture') }}'" class="btn btn-success" id="submit">ソート画面</button>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>問題タイトル</th>
                        <th>詳細</th>
                        <th>編集</th>
                        <th>削除</th>
                    </tr>
                </thead>
                    <tbody class="sortable">
                        @foreach ($prefectures as $prefecture)
                            <tr>
                                <td>{{ $prefecture->name }}</td>
                                <td><a href="{{ route('admin.question', ['id' => $prefecture->id]) }}"
                                        class="btn btn-primary">設問画面</a></td>
                                <td><a href="{{ route('admin.edit', ['id' => $prefecture->id]) }}"
                                        class="btn btn-info">編集</a>
                                </td>
                                <td>
                                    <form action="{{ route('admin.destroy', ['id' => $prefecture->id]) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">削除</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </form>
            </table>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
    <script src="{{ asset('js/quizy.js') }}"></script>
@endsection
