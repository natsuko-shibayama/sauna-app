<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
            // dd($googleUser);
            // Laravel\Socialite\Two\User {#301 ▼ // app/Http/Controllers/Auth/GoogleController.php:21
            //     +id: "114247687572198932229"
            //     +nickname: null
            //     +name: "柴山成諭子"
            //     +email: "sn1027.0629@gmail.com"
            //     +avatar: "https://lh3.googleusercontent.com/a/ACg8ocLU_TU7f0M5KcO4dtsLHkJIgTyJ2I_PGWksRLiB0D-fbFt3i8JN=s96-c"
            //     +user: array:10 [▶]
            //     +attributes: array:6 [▶]
            //     +token: "
            //   ya29.a0AeDClZCVt5V-B57lyfBLj71cqjgJiOTf5otB1NrAQC4Uf6JoDuqcHkmRrXXFOCmoJ4QABGtk93C0VvXd3RfFYBThmrL645PZl4fkAjD02MvoLqKqBnUG1fvYzAqY_Mi9FQALti-KofiicuvYoiLjLwm46
            //    ▶
            //   "
            //     +refreshToken: null
            //     +expiresIn: 3599
            //     +approvedScopes: array:3 [▶]
            //   }

            // ユーザーが存在するか確認
            $user = User::where('email', $googleUser->getEmail())->first();

            // 存在しない場合は新しいユーザーを作成
            if (!$user) {
                $user = new User();
                $user->name = $googleUser->getName();
                $user->email = $googleUser->getEmail();
                $user->google_id = $googleUser->getId();
                $user->password = "password";
                $user->save();
            }

            Auth::login($user);

            return redirect()->route('top');
        } catch (\Exception $e) {
            return redirect('top')->withErrors('Google認証に失敗しました。');
        }
    }
}
