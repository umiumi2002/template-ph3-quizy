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
                </div>
            </div>
            <div>
                <h1 style="color:#555555; text-align:center; font-size:1.2em; padding:24px 0px; font-weight:bold;">問題一覧</h1>
                {{-- @foreach($questions as $question)
                {{ $question -> name }}
                @endforeach --}}
            </div>
        </div>
    </div>
</div>
@endsection
