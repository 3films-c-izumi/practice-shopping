@extends('layouts.app')

@section('title', 'ログイン')

@section('content')

@if ($errors->has('verify'))
<div>
    <span>{{ $errors->first('verify') }}</span>
</div>
@endif

@if (session('status'))
<div>
    <span>{{ session('status') }}</span>
</div>
@endif

<div>
    <h1>ログイン</h1>
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div>
            <label for="login-email">メールアドレス</label>
            <input type="text" name="email" id="login-email">
        </div>
        <div>
            <label for="login-password">パスワード</label>
            <input type="password" name="password" id="login-password">
        </div>
        <input type="submit" value="ログイン" class="c-button--primary">
    </form>
</div>

@endsection
