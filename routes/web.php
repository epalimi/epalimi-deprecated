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

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// 루트페이지
Route::get('/', function () {
    $recentlyInformations = App\Information::orderBy('created_at', 'desc')->take(8)->get();
    $recentlyArticles = App\Article::orderBy('created_at', 'desc')->take(4)->get();
    return view('main.home', ['informations' => $recentlyInformations, 'articles' => $recentlyArticles]);
})->name('main.home');

// 로그인(Auth) 라우트
Auth::routes(['register' => false, 'reset' => false]);

// 어드민 콘솔 라우트 그룹
Route::middleware('auth')->prefix('console')->name('admin.')->group(function () {

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

    // 배너(Banner) 리소스 라우트
    Route::resource('banner', 'BannerController');

    // 단체(Organization) 리소스 라우트
    Route::resource('organization', 'OrganizationController');
});

// 메인 라우트 (일반적인 유저들이 접근하는 라우트)
Route::name('main.')->group(function () {
    // 카테고리
    Route::get('/category', function () {
        $categories = App\Category::all();
        return view('main.categoryIndex', ['categories' => $categories]);
    })->name('category.index');
    Route::get('/category/{category}', function (App\Category $category) {
        $informations = $category->informations()->paginate(12);
        return view('main.category', ['category' => $category, 'informations' => $informations]);
    })->name('category');
    // 카테고리 단체 모아보기
    Route::get('/group/{query}', function ($query) {
        $informations = App\Information::where('organization', $query)->orderBy('created_at', 'desc')->paginate(12);
        return view('main.group', ['query' => $query, 'informations' => $informations]);
    })->name('group');

    // 게시판
    Route::get('/board', function () {
        $boards = App\Board::all();
        return view('main.boardIndex', ['boards' => $boards]);
    })->name('board.index');
    Route::get('/board/{board}', function (App\Board $board) {
        $articles = $board->articles()->paginate(8);
        return view('main.board', ['board' => $board, 'articles' => $articles]);
    })->name('board');

    // 게시글
    Route::get('/article/{article}', function (App\Article $article) {
        $previews = App\Article::where('board_id', $article->board->id)->orderBy('created_at', 'desc')->take(4)->get();
        return view('main.article', ['article' => $article, 'previews' => $previews]);
    })->name('article');

    // 단체
    Route::get('/organization', function () {
        $categories = App\Organization::select(['category', 'id'])->orderBy('created_at')->groupBy('category')->get();
        return view('main.organization', ['categories' => $categories]);
    })->name('organization');
});
