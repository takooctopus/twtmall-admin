<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'Admin\IndexController@index');

Route::group([/*'middleware' => 'auth',*/'namespace' => 'Admin'], function () {
    Route::get('/index','IndexController@index');
    Route::group(['prefix' => 'user'],function (){
        Route::get('/','UserController@index');
        Route::get('/{username?}/detail','UserController@detail');
        Route::get('/{username?}/goods','UserController@goods');
    });
    Route::get('/category/{category_s_id?}','CategoryController@index');
    Route::group(['prefix' => 'goods'],function (){
        Route::get('/','GoodsController@index');
        Route::get('/{goods_id}/detail','GoodsController@detail');
    });
    Route::get('/comment','CommentController@index');
    Route::get('/img','ImgController@index');
    Route::get('/needs','NeedsController@index');
});

Route::group(['prefix' => 'model'],function (){
    Route::get('/img',function (){ dd(\App\Model\Img::all()); });
    Route::get('goods',function (){{ dd(\App\Model\Goods::all()); }});
});



Route::get('/admin/login','Auth\AdminAuthController@showLoginForm');
Route::post('/admin/login','Auth\AdminAuthController@loginOrBack');
Route::get('/admin/logout','Auth\AdminAuthController@logoutAndRedirect');
Route::get('/userinfo',function (){
    if (!Auth::check()) return 'no';
    $user = Auth::user();
    dd($user);
});
Route::get('/base',function (){
    return view('layouts.base');
});

