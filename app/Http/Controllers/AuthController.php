<?php

namespace App\Http\Controllers;

use App\Actions\AuthAction;
use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __invoke()
    {
        return view('auth');
    }
    public function store(AuthAction $action, AuthRequest $request)
    {

        if ($action->authorize($request) == "ok") {
            return to_route('home');
        } else {
            return back()->withErrors(['email' => 'Неверный пароль или логин'])->onlyInput('email');
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return back()->with('success', 'Вы успешно вышли из аккаунта!');
    }
}
