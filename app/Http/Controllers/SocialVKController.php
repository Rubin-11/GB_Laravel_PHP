<?php

namespace App\Http\Controllers;

use App\Services\AuthService;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialVKController extends Controller
{
    public function loginVK()
    {
        return Socialite::driver('vkontakte')->redirect();
    }

    public function responseVK(AuthService $service)
    {
        $user = Socialite::driver('vkontakte')->user();
//        dd($user);
        return $service->login($user);
    }
}
