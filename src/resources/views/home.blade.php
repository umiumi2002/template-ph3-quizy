@extends('layouts.app')
{{-- layoutsフォルダ内のapp.blade.phpを親とする --}}

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        You are logged in!
                        <div>
                            <a href="{{ route('admin.index') }}">管理画面へ</a>
                        </div>

                    </div>
                </div>
                <div>
                    {{-- <h1 style="color:#555555; text-align:center; font-size:1.2em; padding:24px 0px; font-weight:bold;">問題一覧
                    </h1> --}}
                    {{-- <div class="question">

                        <button href="{{ url('/add') }}">追加</button>
                        <br>
                        <ul>
                            @foreach ($prefectures as $prefecture)
                                <form action="" method="post">
                                    @csrf
                                    <li>{{ $prefecture->name }}</li>
                                </form>
                                <a href="{{ url('/edit') }}">変更</a>
                        </ul>
                    </div> --}}
                    {{-- <form action="/quizy/home" method="post">
                        <table>
                            @csrf
                            <tr>
                                <th>prefecture_name:</th>
                                <td><input type="text" name="prefecture_name" value="{{ old('prefecture_name') }}"></td>
                            </tr>
                            <tr>
                                <th></th>
                                <td><input type="submit" value="送信"></td>
                            </tr>
                        </table>
                    </form> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
