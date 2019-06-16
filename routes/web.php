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

Route::get('/', 'PagesController@root')->name('root');

// 用户注册相关路由
Route::get ('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Email 认证相关路由
Route::get('email/verify',      'Auth\VerificationController@show')  ->name('verification.notice');
Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');
Route::get('email/resend',      'Auth\VerificationController@resend')->name('verification.resend');

// 用户身份验证相关的路由
Route::get ('login',  'Auth\LoginController@showLoginForm')->name('login');
Route::post('login',  'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')       ->name('logout');

// 密码重置相关路由
Route::get ('password/reset',         'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email',         'Auth\ForgotPasswordController@sendResetLinkEmail') ->name('password.email');
Route::get ('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')       ->name('password.reset');
Route::post('password/reset',         'Auth\ResetPasswordController@reset')               ->name('password.update');

/*
 * Route::get  ('/users/{user}',      'UsersController@show')  ->name('users.show');
 * Route::get  ('/users/{user}/edit', 'UsersController@edit')  ->name('users.edit');
 * Route::patch('/users/{user}',      'UsersController@update')->name('users.update');
 *
 * HTTP请求 URI                动作                    作用
 * GET     /users/{user}      UsersController@show   显示用户个人信息页面
 * GET     /users/{user}/edit UsersController@edit   显示编辑个人资料页面
 * PATCH   /users/{user}      UsersController@update 处理 edit 页面提交的更改
 */
Route::resource('users', 'UsersController', ['only' => ['show', 'update', 'edit']]);

Route::resource('topics',                 'TopicsController', ['only' => ['index', 'create', 'store', 'update', 'edit', 'destroy']]);
Route::get     ('topics/{topic}/{slug?}', 'TopicsController@show')       ->name('topics.show');
Route::post    ('upload_image',           'TopicsController@uploadImage')->name('topics.upload_image');

Route::resource('categories', 'CategoriesController', ['only' => ['show']]);

