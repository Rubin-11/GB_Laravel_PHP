<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthorizationPageController extends Controller
{
    public function authorizationPage()
    {
        return view('authorization');
    }
}
