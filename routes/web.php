<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

Route::get('/', function () {
    return redirect()->route('posts.index');
})->name('home');


Route::get('posts/deleted', [PostController::class, 'allDeletedPosts'])->name('posts.deleted');
Route::get('posts/{id}/delete', [PostController::class, 'deleteForever'])->name('posts.delete');
Route::get('posts/{id}/restore', [PostController::class, 'restore'])->name('posts.restore');

Route::resource('posts', PostController::class);


Route::controller(CommentController::class)->name('posts.comment.')->prefix('posts')->group(function () {
    Route::get('/{id}/comments/all', 'showAllComments')->name('all.comment');
    Route::post('/{id}/comment/store', 'store')->name('store');
});















Route::fallback(function () {
    return redirect()->route('posts.index');
});
