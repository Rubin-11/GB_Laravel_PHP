<?php

namespace App\Services;

//use http\Client\Curl\User;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthService
{
    public function login($user)
    {
        $email = $user->getEmail();
        $name = $user->getName();

        // Проверяем, существует ли пользователь с указанным email
        $existingUser = User::where('email', $email)->first();
        if ($existingUser) {
            // Если пользователь уже существует, обновляем его имя
            $existingUser->name = $name;
            $existingUser->save();
            Auth::login($existingUser);
        } else {
            // Если пользователь не существует, предлагаем зарегистрироваться
            return view('auth/register', compact('email', 'name'));
        }

        // Перенаправляем пользователя на страницу приветствия
        return redirect()->route('welcome');
    }
}
