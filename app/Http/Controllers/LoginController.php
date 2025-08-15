<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function ShowLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $messages = [
            '*.required' => '入力してください',
            '*.email' => '正しい形式で入力してください',
        ];

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ], $messages);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('home')->with('toast', 'ログインしました');
        }

        return back()->withErrors([
            'error' => 'メールアドレスまたはパスワードが正しくありません',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home')->with('toast', 'ログアウトしました');
    }
}
