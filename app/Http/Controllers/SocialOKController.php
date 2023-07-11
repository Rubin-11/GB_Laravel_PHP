<?php

namespace App\Http\Controllers;

use App\Services\AuthService;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialOKController extends Controller
{
    public function loginOK()
    {
        return Socialite::driver('odnoklassniki')->redirect();
    }

    public function responseOK(AuthService $service)
    {
        $user = Socialite::driver('odnoklassniki')->user();
//        dd($user);
        return $service->login($user);
    }
}
