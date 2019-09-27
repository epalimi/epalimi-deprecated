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

// 루트페이지
Route::get('/', function () {
    return view('welcome');
});

// 로그인(Auth) 라우트
Auth::routes(['register' => false, 'reset' => false]);

// 어드민 콘솔 라우트 그룹
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {

    // 메인 페이지 라우트
    Route::get('/', function () {
        return view('admin.main');
    })->name('main');

    // 인포메이션(Information) 리소스 라우트
    Route::resource('information', 'InformationController');

    // 카테고리(Category) 리소스 라우트
    Route::resource('category', 'CategoryController');

    // 게시판(Board) 리소스 라우트
    Route::resource('board', 'BoardController');
    Route::resource('board.article', 'ArticleController');
});

// 메인 라우트 (일반적인 유저들이 접근하는 라우트)
Route::name('main.')->group(function () {
    Route::get('/test', function () {
        $boards = App\Board::all();
        return view('main.home', compact('boards'));
    })->name('home');
});
