<?php

namespace App\Http\Controllers\AdminAuth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminAuth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * 管理者ログイン画面表示
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * 管理者ログイン処理
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        // 管理画面トップにリダイレクト
        return redirect()->intended(route('admin.top', absolute: false));
    }

    /**
     * 管理者ログアウト処理
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        // 管理者ログイン画面にリダイレクト
        return redirect()->intended(route('admin.login', absolute: false));
    }
}
