<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\registration;
use App\Http\Controllers\ResetPasswordContoller;
use App\Models\registermodel;
use PhpParser\Node\Expr\FuncCall;

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
    return view('login_view');
});
Route::get('/register',[registration::class,'index'])->name('regitser.form');

Route::post('/register',[registration::class,'register'])->name('store');

Route::get("/dropzone/view",[registration::class,'dropzone_view']);

Route::post('/dropzonestore',[registration::class,'dropzonestore'])->name('dropzone.store');

Route::post('/removefile',[registration::class,'removefile'])->name('remove.file');

Route::get('/user/view',[registration::class,'user_view'])->name('user_view')->middleware('auth');

Route::get('/user/data',[registration::class,'user_list'])->name('user_data')->middleware('auth');

Route::get('/user/delete/{id}',[registration::class,'user_delete'])->name('user_delete')->middleware('auth');

Route::get('/user/edit/{id}',[registration::class,'user_edit'])->name('user_edit');

Route::post('/user_update/{id}',[registration::class,'user_update'])->name('update')->middleware('auth');

Route::get('/login',[LoginController::class,'index'])->name('login');

Route::post('/login/post',[LoginController::class,'login_post'])->name('login.post');

Route::get('/logout',[LoginController::class,'logout'])->name('logout');

Route::get('/forgotpassword',[ResetPasswordContoller::class,'index']);

Route::post('/submitForget',[ResetPasswordContoller::class,'submitForget'])->name('submitForget');

Route::get('/resetpasswordform/{token}',[ResetPasswordContoller::class,'resetpasswordform'])->name('resetpasswordform');


    