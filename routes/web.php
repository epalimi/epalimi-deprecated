<?php

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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false, 'reset' => false]);

Route::get('/home', 'HomeController@index')->name('home');



/**
 * 어드민 콘솔 라우트 그룹
 */
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    /**
     * 메인 페이지
     */
    Route::get('/', function () {
        return view('admin.main');
    })->name('main');
});
