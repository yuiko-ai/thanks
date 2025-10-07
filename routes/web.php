<?php

declare(strict_types=1);

use App\Http\Controllers\MailController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\MailSendController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// ログイン画面
Route::get('/login', function () {
    return view('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

//ユーザー一覧
Route::get('/users',[UserController::class,'index'])->name('users');

//thanksメッセージ入力
Route::get('/message',[MessageController::class,'index'])->name('message.index');

//DB登録
Route::post('/message',[MessageController::class,'store'])->name('message.store');


//送信完了のメッセージ表示画面
Route::get('/success',function(){
    return view('success');
})->name('success');


//mail受信一覧取得
Route::get('/mail',[MailController::class,'index'])->name('mail');

//mail送信一覧取得
Route::get('/mailsend',[MailSendController::class,'index'])->name('mailsend');
