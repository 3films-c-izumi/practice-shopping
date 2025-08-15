@extends('layouts.app')

@section('title', 'アカウント作成')

@section('content')

<div class="p-register">
    <h1>アカウント作成</h1>
    <h2>入力内容の確認</h2>
    <form action="{{ route('register') }}" method="post">
        @csrf
        <dl>
            <dt>お名前</dt>
            <dd>{{ $data['last_name'] }} {{ $data['first_name'] }}</dd>
            <dt>フリガナ</dt>
            <dd>{{ $data['last_name_kana'] }} {{ $data['first_name_kana']}}</dd>
            <dt>メールアドレス</dt>
            <dd>{{ $data['email'] }}</dd>
        </dl>
        <input type="submit" value="送信" class="c-button--primary">
    </form>
    <form action="{{ route('register.form') }}" method="get">
        <input type="hidden" name="last_name" value="{{ $data['last_name'] }}">
        <input type="hidden" name="first_name" value="{{ $data['first_name'] }}">
        <input type="hidden" name="last_name_kana" value="{{ $data['last_name_kana'] }}">
        <input type="hidden" name="first_name_kana" value="{{ $data['first_name_kana'] }}">
        <input type="hidden" name="email" value="{{ $data['email'] }}">
        <input type="hidden" name="password" value="{{ $data['password'] }}"><br>
        <input type="submit" value="戻る" class="c-button--secondary">
    </form>
</div>

@endsection
