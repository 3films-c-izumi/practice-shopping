<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function ShowRegistrationForm()
    {
        return view('auth.register.form');
    }

    public function confirm(Request $request)
    {
        $messages = [
            '*.required'   => '入力してください',
            '*.regex'      => '全角カタカナで入力してください',
            '*.max'        => '255文字以下で入力してください',
            '*.min'        => '8文字以上で入力してください',
            '*.string'     => '使用できない文字が含まれています',
            '*.confirmed'  => '確認用パスワードが一致しません',
            'email.email'  => '正しい形式で入力してください',
            'email.unique' => 'このメールアドレスはすでに使用されています',
        ];
        $validated = $request->validate([
            'last_name' => ['required', 'string', 'max:255'],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name_kana' => ['required', 'string', 'max:255', 'regex:/^[ァ-ヶー]+$/u'],
            'first_name_kana' => ['required', 'string', 'max:255', 'regex:/^[ァ-ヶー]+$/u'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], $messages);

        $request->session()->put('register_data', $validated);
        return view('auth.register.confirm', ['data' => $validated]);
    }

    public function register(Request $request)
    {
        $data = $request->session()->get('register_data');

        if (!$data) {
            return redirect()->route('register.form')->withErrors(['session' => 'セッションが切れました。もう一度入力してください。']);
        }

        $token = Str::random(32);

        $user = User::create([
            'last_name' => $data['last_name'],
            'first_name' => $data['first_name'],
            'last_name_kana' => $data['last_name_kana'],
            'first_name_kana' => $data['first_name_kana'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'verification_token' => $token,
            'is_verified' => false,
        ]);

        $this->sendVerificationEmail($user);

        $request->session()->forget('register_data');

        return redirect()->route('login')->with('status', '認証メールを送信しました。メールをご確認ください。');
    }

    private function sendVerificationEmail($user)
    {
        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->CharSet = 'UTF-8';
            $mail->Host = 'smtp.ethereal.email';
            $mail->SMTPAuth = true;
            $mail->Username = 'paris0@ethereal.email';
            $mail->Password = 'QNujsTzWDUwKcnnuVp';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            $mail->setFrom('no-reply@practice-shopping.com', 'practice-shopping');
            $mail->addAddress($user->email, $user->last_name. ' '. $user->first_name.'様');

            $verifyUrl = route('verify.email', ['token' => $user->verification_token]);
            $mail->isHTML(true);
            $mail->Subject = '【メールアドレスの認証】practice-shopping';
            $mail->Body = "以下のリンクをクリックして認証を完了してください;<br><a href='{$verifyUrl}' target='_blank'>{$verifyUrl}</a>";

            $mail->send();
        } catch (Exception $e) {
            throw new \Exception("メールの送信に失敗しました: {$mail->ErrorInfo}");
        }
    }

    public function verify($token)
    {
        $user = User::where('verification_token', $token)->first();

        if (!$user) {
            return redirect('/login')->withErrors(['verify' => 'リンクが無効です']);
        }

        $user->is_verified = true;
        $user->verification_token = null;
        $user->save();

        return redirect('/login')->with('status', 'メール認証が完了しました。ログインしてください。');
    }
}
