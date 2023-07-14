<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    |    Этот контроллер выполняет аутентификацию пользователей в приложении и
    |перенаправляет их на ваш домашний экран. Контроллер использует признак
    |чтобы удобно предоставлять его функциональность вашим приложениям.
    |
    */

    use AuthenticatesUsers;

    /**
     * Куда перенаправлять пользователей после входа в систему.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::WELCOME;

    /**
     * Создайте новый экземпляр контроллера.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function authenticated(Request $request, $user)
    {
        // Сюда попадаем после успешной авторизации
    }
}
