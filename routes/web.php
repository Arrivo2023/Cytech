<?php

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

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/', [App\Http\Controllers\SarchController::class, 'index'])->name('index');
//Route::get('/sarch_index', [App\Http\Controllers\SarchController::class, 'index'])->name('index');

Route::get('/ajax_index', [App\Http\Controllers\SarchController::class, 'ajaxIndex'])->name('ajax_index');


Route::get('/sarch', [App\Http\Controllers\SarchController::class, 'ajaxSarchList'])->name('sarchList');

Route::post('/newRecord', [App\Http\Controllers\OperationController::class, 'newRecord'])->name('newRecord');
Route::post('/update', [App\Http\Controllers\OperationController::class, 'update'])->name('update');
Route::get('/itemDelete', [App\Http\Controllers\OperationController::class, 'itemDelete'])->name('itemDelete');
//Route::post('/destroy', [App\Http\Controllers\OperationController::class, 'destroy'])->name('destroy');

/*
ログイン・ログアウトに関連するルートを設定。
デフォルトで生成されたAuth::routes()メソッドを使用すると、必要なルートが自動的に設定される。
 */
Auth::routes();
/*商品一覧ページにアクセスした時、ログインしていなければログインページに遷移*/
Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [App\Http\Controllers\SarchController::class, 'index'])->name('home');
    Route::get('/sarch_index', [App\Http\Controllers\SarchController::class, 'index'])->name('index');
});
