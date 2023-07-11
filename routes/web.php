<?php

use App\Http\Controllers\Admin\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\Admin\NewsController;

Auth::routes();

Route::get('/auth/vk',[\App\Http\Controllers\SocialVKController::class, 'loginVK'])
    ->name('vkLogin');
Route::get('/auth/vk/response',[\App\Http\Controllers\SocialVKController::class, 'responseVK'])
    ->name('vkResponse');

Route::get('/auth/ok',[\App\Http\Controllers\SocialOKController::class, 'loginOK'])
    ->name('okLogin');
Route::get('/auth/ok/response',[\App\Http\Controllers\SocialOKController::class, 'responseOK'])
    ->name('okResponse');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [WelcomeController::class, 'welcome'])
        ->name('welcome');
    Route::get('/logout', function () {
        Auth::logout();
        return redirect()->route('login');
    })->name('account.logout');
    Route::prefix('news')->group(function () {
        Route::get('/{id?}', [NewsController::class, 'news'])
            ->name('news_categories');
        Route::get('/categories/{id?}', [NewsController::class, 'newsItem'])->name('news');
    });
    Route::match(['get', 'post'], '/orderNews', [NewsController::class, 'orderNews'])
        ->name('orderNews');
    Route::match(['get', 'post'], '/feedback', [NewsController::class, 'feedbackNews'])
        ->name('feedbackNews');
    Route::match(['get', 'post'], '/feedback/store', [NewsController::class, 'storeFeedback'])
        ->name('storeFeedback');
    Route::match(['get', 'post'], '/order/store', [NewsController::class, 'storeOrder'])
        ->name('order.store');

    Route::prefix('admin')->middleware('admin')->group(function () {
        Route::match(['get', 'post'], '/allNews', [NewsController::class, 'allNews'])
            ->name('allNews');
        Route::match(['get', 'post'], '/updateNews/{news}', [NewsController::class, 'updateNews'])
            ->name('updateNews');
        Route::match(['get', 'post'], '/deleteNews/{news}', [NewsController::class, 'deleteNews'])
            ->name('deleteNews');
        Route::match(['get', 'post'], '/addNews', [NewsController::class, 'addNews'])
            ->name('addNews');
        Route::match(['get', 'post'], '/profile', [ProfileController::class, 'update'])
            ->name('updateProfile');

        Route::get('/parser', [\App\Http\Controllers\Admin\ParserController::class, 'index'])
        ->name('parser');
    });
});
