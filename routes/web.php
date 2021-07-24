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



Route::get('/','front\post@home');
//Route::get('/post/{id}','front\post@post');
Route::get('/post/{id}','front\post@post');
Route::get('/page/{id}','front\post@page');
Route::get('/contact','front\post@contact');
Route::post('/contact_submit','front\post@contact_submit');


Route::view('/admin/login','admin.login');
Route::post('/admin/login_submit','Admin_auth@login_submit');
Route::get('/admin/logout',function(){
    session()->flash('msg','Successfully Log Out');
    session()->forget('BLOG_USER_ID');
    return redirect('admin/login');
});
Route::group(['middleware'=>['admin_auth']],function(){
    Route::get('/admin/post/list','admin\post@list');
    Route::view('/admin/post/add','admin.post.add');
    Route::post('/admin/post/submit','admin\post@submit');
    Route::get('/admin/post/delete/{id}','admin\post@delete');
    Route::get('/admin/post/edit/{id}','admin\post@edit');
    Route::post('/admin/post/update/{id}','admin\post@update');

    Route::get('/admin/page/list','admin\page@list');
    Route::view('/admin/page/add','admin.page.add');
    Route::post('/admin/page/submit','admin\page@submit');
    Route::get('/admin/page/delete/{id}','admin\page@delete');
    Route::get('/admin/page/edit/{id}','admin\page@edit');
    Route::post('/admin/page/update/{id}','admin\page@update');

    Route::get('/admin/contact/list','admin\contact@list');
});