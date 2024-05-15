<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    Route::redirect()->route('home.index');
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


});








Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
