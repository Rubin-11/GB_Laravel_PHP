<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AddingNewsController extends Controller
{
    public function addingNews()
    {
        return view('addingNews');
    }
}
