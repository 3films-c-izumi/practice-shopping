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

    private function sendVerificationEmail($user)
    {
        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.ethereal.email';
            $mail->SMTPAuth = true;
            $mail->Username = 'paris0@ethereal.email';
            $mail->Password = 'QNujsTzWDUwKcnnuVp';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            $mail->setFrom('no-reply@practice-shopping.com', 'practice-shopping');
            $mail->addAddress($user->email, $user->name);

            // メール本文についてはこれから記入

        } catch (Exception $e) {
            throw new \Exception("メールの送信に失敗しました: {$mail->ErrorInfo}");
        }
    }
}
