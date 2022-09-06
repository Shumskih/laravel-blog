<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

$namespace = 'App\\Http\\Controllers\\';

Route::namespace($namespace . 'Main')->group(function () {
    Route::get('/', 'IndexController');
});

Route::namespace($namespace . 'Admin')
    ->middleware(['auth', 'admin'])
    ->prefix('admin')
    ->group(function () {
        Route::namespace('Main')->group(function () {
            Route::get('/', 'IndexController');
        });

        Route::namespace('Post')
            ->prefix('posts')
            ->group(function () {
                Route::get('/', 'IndexController')->name('admin.post.index');
                Route::get('/create', 'CreateController')->name('admin.post.create');
                Route::post('/', 'StoreController')->name('admin.post.store');
                Route::get('/{post}', 'ShowController')->name('admin.post.show');
                Route::get('/{post}/edit', 'EditController')->name('admin.post.edit');
                Route::patch('/{post}', 'UpdateController')->name('admin.post.update');
                Route::delete('/{post}', 'DeleteController')->name('admin.post.delete');
            });

        Route::namespace('Category')
            ->prefix('categories')
            ->group(function () {
                Route::get('/', 'IndexController')->name('admin.category.index');
                Route::get('/create', 'CreateController')->name('admin.category.create');
                Route::post('/', 'StoreController')->name('admin.category.store');
                Route::get('/{category}', 'ShowController')->name('admin.category.show');
                Route::get('/{category}/edit', 'EditController')->name('admin.category.edit');
                Route::patch('/{category}', 'UpdateController')->name('admin.category.update');
                Route::delete('/{category}', 'DeleteController')->name('admin.category.delete');
            });

        Route::namespace('Tag')
            ->prefix('tags')
            ->group(function () {
                Route::get('/', 'IndexController')->name('admin.tag.index');
                Route::get('/create', 'CreateController')->name('admin.tag.create');
                Route::post('/', 'StoreController')->name('admin.tag.store');
                Route::get('/{tag}', 'ShowController')->name('admin.tag.show');
                Route::get('/{tag}/edit', 'EditController')->name('admin.tag.edit');
                Route::patch('/{tag}', 'UpdateController')->name('admin.tag.update');
                Route::delete('/{tag}', 'DeleteController')->name('admin.tag.delete');
            });

        Route::namespace('User')
            ->prefix('users')
            ->group(function () {
                Route::get('/', 'IndexController')->name('admin.user.index');
                Route::get('/create', 'CreateController')->name('admin.user.create');
                Route::post('/', 'StoreController')->name('admin.user.store');
                Route::get('/{user}', 'ShowController')->name('admin.user.show');
                Route::get('/{user}/edit', 'EditController')->name('admin.user.edit');
                Route::patch('/{user}', 'UpdateController')->name('admin.user.update');
                Route::delete('/{user}', 'DeleteController')->name('admin.user.delete');
            });
    });

Auth::routes();
