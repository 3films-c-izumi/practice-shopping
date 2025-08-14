@extends('layouts.app')

@section('title', 'ログイン')

@section('content')

<div>
    <h1>ログイン</h1>
    <form method="POST">
        <div>
            <label for="login-email">メールアドレス</label>
            <input type="text" name="email" id="login-email">
        </div>
        <div>
            <label for="login-password">パスワード</label>
            <input type="password" name="password" id="login-password">
        </div>
        <input type="submit" value="ログイン">
    </form>
</div>

@endsection
