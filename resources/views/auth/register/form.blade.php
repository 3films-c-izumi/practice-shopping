@extends('layouts.app')

@section('title', 'アカウント作成')

@section('content')

<div class="p-register">
    @if ($errors->has('session'))
    <span>{{ $errors->first('session') }}</span>
    @endif
    <h1>アカウント作成</h1>
    <h2>アカウント情報の入力</h2>
    <form action="/register/confirm" method="POST">
        @csrf
        <div>
            <div class="p-register__input-group">
                <label for="register-last-name">姓</label>
                <input type="text" name="last_name" id="register-last-name" value="{{ old('last_name', request('last_name')) }}">
                @error('last_name')
                <span>{{ $message }}</span>
                @enderror
            </div>
            <div class="p-register__input-group">
                <label for="register-first-name">名</label>
                <input type="text" name="first_name" id="register-first-name" value="{{ old('first_name', request('first_name')) }}">
                @error('first_name')
                <span>{{ $message }}</span>
                @enderror
            </div>
            <div class="p-register__input-group">
                <label for="register-last-name-kana">姓（カナ）</label>
                <input type="text" name="last_name_kana" id="register-last-name-kana" value="{{ old('last_name_kana', request('last_name_kana')) }}">
                @error('last_name_kana')
                <span>{{ $message }}</span>
                @enderror
            </div>
            <div class="p-register__input-group">
                <label for="register-first-name-kana">名（カナ）</label>
                <input type="text" name="first_name_kana" id="register-first-name-kana" value="{{ old('first_name_kana', request('first_name_kana')) }}">
                @error('first_name_kana')
                <span>{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="p-register__input-group">
            <label for="register-email">メールアドレス</label>
            <input type="text" name="email" id="register-email" value="{{ old('email', request('email')) }}">
            @error('email')
                <span>{{ $message }}</span>
                @enderror
        </div>
        <div class="p-register__input-group">
            <label for="register-password">パスワード</label>
            <input type="password" name="password" id="register-password" value="{{ request('password') }}">
            @error('password')
                <span>{{ $message }}</span>
                @enderror
        </div>
        <div class="p-register__input-group">
            <label for="register-password-confirm">パスワード（確認用）</label>
            <input type="password" name="password_confirmation" id="register-password-confirm">
        </div>
        <input type="submit" value="確認" class="c-button--primary">
    </form>
</div>

@endsection
