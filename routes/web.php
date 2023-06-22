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

//Route::post('/authorization_page', [AuthorizationPageController::class, 'authorizationPage'])->name('authorizationPage');
Route::match(['get' , 'post'],'/authorization_page',[AuthorizationPageController::class,'authorizationPage'])->name('authorizationPage');
Route::match(['get' , 'post'],'/login',[AuthorizationPageController::class,'login'])->name('login');

Route::prefix('admin')->group(function () {
    Route::match(['get', 'post'], '/allNews', [NewsController::class, 'allNews'])->name('allNews');
    Route::match(['get', 'post'], '/updateNews/{news}', [NewsController::class, 'updateNews'])->name('updateNews');
    Route::match(['get', 'post'], '/deleteNews/{news}', [NewsController::class, 'deleteNews'])->name('deleteNews');

    Route::match(['get', 'post'], '/addNews', [NewsController::class, 'addNews'])->name('addNews');
    Route::match(['get', 'post'], '/feedback', [NewsController::class, 'feedbackNews'])->name('feedbackNews');
    Route::match(['get', 'post'], '/feedback/store', [NewsController::class, 'storeFeedback'])->name('feedback.store');
    Route::match(['get', 'post'], '/orderNews', [NewsController::class, 'orderNews'])->name('orderNews');
    Route::match(['get', 'post'], '/order/store', [NewsController::class, 'storeOrder'])->name('order.store');
});
