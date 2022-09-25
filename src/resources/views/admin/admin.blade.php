@extends('layouts.app')

@section('content')
<div class="">
    <div class="col-md-8">
        <h1 class="">問題タイトルを管理</h1>
        <button onclick="location.href='{{ route('admin.create') }}' " class="btn btn-success">追加</button>
        <table class="table table-striped">
            <thead>
                <tr>
                  <th>問題タイトル</th>
                  <th>詳細</th>
                  <th>編集</th>
                </tr>
              </thead>
            <tbody class="">
                @foreach ($prefectures as $prefecture)
                    <tr>
                        <td>{{ $prefecture->name }}</td>
                        <td><a href="{{ route('admin.show', ['id'=>$prefecture->id]) }}" class="btn btn-primary">詳細</a></td>
                        <td><a href="{{ route('admin.edit', ['id'=>$prefecture->id]) }}" class="btn btn-info">編集</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection