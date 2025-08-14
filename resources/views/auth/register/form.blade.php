@extends('layouts.app')

@section('title', 'アカウント作成')

@section('content')

<div>
    <h1>アカウント作成</h1>
    <form method="POST">
        <div>
            <label for="register-email">メールアドレス</label>
            <input type="text" name="email" id="register-email">
        </div>
        <div>
            <label for="register-password">パスワード</label>
            <input type="password" name="password" id="register-password">
        </div>
        <input type="submit" value="確認">
    </form>
</div>

@endsection
