@extends('layouts.app')

@section('content')
<div class="">
    <div class="col-md-8">
        <h1 class="">問題タイトルを管理</h1>
        <button onclick="location.href='{{ route('admin.create') }}' " class="btn btn-success">追加</button>
        <table class="row justify-content-center">
            {{-- <thead>
    <tr>
      <th>ブックナンバー</th>
      <th>ブック名</th>
      <th>作成日</th>
    </tr>
  </thead> --}}

            <tbody class="">
                @foreach ($prefectures as $prefecture)
                    <tr>
                        <td>{{ $prefecture->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection