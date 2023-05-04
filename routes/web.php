<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\AuthorizationPageController;

Route::get('/', [WelcomeController::class, 'welcome'])->name('welcome');

Route::prefix('news')->group(function () {
    Route::get('/{id?}', [NewsController::class, 'news'])->name('news_categories');
    Route::get('/categories/{id?}', [NewsController::class, 'newsItem'])->name('news');
});

Route::get('/authorization_page', [AuthorizationPageController::class, 'authorizationPage'])->name('authorizationPage');

Route::prefix('admin')->group(function () {
    Route::match(['get', 'post'], '/addNews', [NewsController::class, 'addNews'])->name('addNews');
    Route::match(['get', 'post'], '/feedback', [NewsController::class, 'feedbackNews'])->name('feedbackNews');
    Route::match(['get', 'post'], '/feedback/store', [NewsController::class, 'storeFeedback'])->name('feedback.store');
    Route::match(['get', 'post'], '/order', [NewsController::class, 'orderNews'])->name('orderNews');
    Route::match(['get', 'post'], '/order/store', [NewsController::class, 'storeOrder'])->name('order.store');
});
