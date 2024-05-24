<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\ProfileController;


Route::redirect('/', '/home', 301);



Route::group(['namespace' => 'App\Http\Controllers\Home' ], function () {
    Route::get('/home', 'IndexController')->name('home.index');;
});

Route::group(['namespace' => 'App\Http\Controllers\Comment' ], function () {

    Route::post('/comment/{id}' ,'StoreController')->name('comment.store');
    Route::post('/commentasd' ,'testController')->name('comment.create');

});
Route::group(['namespace' => 'App\Http\Controllers\Like' ], function () {

    Route::post('/like' ,'StoreController')->name('like.store');

});

Route::group(['namespace' => 'App\Http\Controllers\Post' ], function () {

    Route::get('/forum', 'IndexController')->name('forum.index');
    Route::get('/forum/{post}', 'ShowController')->name('forum.show');
    Route::post('/forum', 'StoreController')->name('forum.store');

});

Route::group(['namespace' => 'App\Http\Controllers\Article' ], function () {

    Route::get('/article', 'IndexController')->name('article.index');
    Route::get('/article/create', 'CreateController')->name('article.create');
    Route::get('/article/{article}', 'ShowController')->name('article.show');
    Route::post('/article', 'StoreController')->name('article.store');

});

Route::group(['namespace' => 'App\Http\Controllers\Guid' ], function () {

    Route::get('/guid', 'IndexController')->name('guid.index');
    Route::get('/guid/create', 'CreateController')->name('guid.create');
    Route::get('/guid/{guid}', 'ShowController')->name('guid.show');
    Route::post('/guid', 'StoreController')->name('guid.store');

});


Route::group(['namespace' => 'App\Http\Controllers' ], function () {
    Route::get('/game_get','GameController')->name('GameController');
});

Route::group(['namespace' => 'App\Http\Controllers\Image' ], function () {
    Route::post('/image_store', 'StoreController')->name('image.store');
});










Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
