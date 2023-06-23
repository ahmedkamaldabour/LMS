<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ], function () { //...

    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/post-view/{id}',
        function ($id) {
            $post = \App\Models\Post::find($id);
            event(new \App\Events\PostView($post, request()->ip()));
            return '<h> post viewed </h>' . $post->view_count;
        }
    )->name('post-view');

});


