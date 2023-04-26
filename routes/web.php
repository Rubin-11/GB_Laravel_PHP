<?php

use Illuminate\Support\Facades\Route;

Route::get('/about', function () {
    return view('about');
});

Route::get('/', [\App\Http\Controllers\WelcomeController::class, 'welcome']);

Route::get('/news/{id?}', [\App\Http\Controllers\NewsController::class, 'news' ])
    ->name('news_categories');

Route::get('/news/categories/{id?}', [\App\Http\Controllers\NewsController::class, 'newsItem' ])
    ->name('news');

Route::get('/authorization_page', [\App\Http\Controllers\AuthorizationPageController::class, 'authorizationPage' ])
    ->name('authorizationPage');

Route::get('/addingNews', [\App\Http\Controllers\AddingNewsController::class, 'addingNews' ])
    ->name('addingNews');
