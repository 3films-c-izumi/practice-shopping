@extends('layouts.app')

@section('title', 'ログイン')

@section('content')

@if ($errors->has('error'))
<div id="js-toast-message" style="display: none;">{{ $errors->first('error') }}</div>
@endif

<div class="p-login">
    <h1 class="p-login__title">ログイン</h1>
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="c-form-group js-formGroup">
            <label for="login-email" class="c-form-group__label js-formGroupLabel">メールアドレス</label>
            <input type="text" name="email" id="login-email" value="{{ old('email', request('email')) }}" class="c-form-group__input js-formGroupInput">
            @error('email')
            <span>{{ $message }}</span>
            @enderror
        </div>
        <div class="c-form-group js-formGroup">
            <label for="login-password" class="c-form-group__label js-formGroupLabel">パスワード</label>
            <input type="password" name="password" id="login-password" value="{{ old('password', request('password')) }}" class="c-form-group__input js-formGroupInput">
            @error('password')
            <span>{{ $message }}</span>
            @enderror
        </div>
        <input type="submit" value="ログイン" class="c-button--primary">
    </form>
</div>

@endsection
