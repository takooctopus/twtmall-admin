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
        Route::get('/ajaxIndex','UserController@ajaxIndex');
        Route::get('/','UserController@index');
        Route::get('/{username?}/detail','UserController@detail');
        Route::get('/{username?}/goods','UserController@goods');
        Route::get('/{username?}/needs','UserController@needs');
        Route::get('/{username?}/collection','UserController@collection');
    });
    Route::group(['prefix' => 'category'],function (){
        Route::get('/ajaxcategorytable','CategoryController@ajaxCategoryTable');
        Route::get('/ajaxaddcategory','CategoryController@ajaxAddCategory');
        Route::get('/ajaxdeletecategory','CategoryController@ajaxDeleteCategory');

        Route::get('/ajaxcategory_stable','CategoryController@ajaxCategory_sTable');
        Route::get('/ajaxaddcategory_s','CategoryController@ajaxAddCategory_s');
        Route::get('/ajaxdeletecategory_s','CategoryController@ajaxDeleteCategory_s');

        Route::get('/{category_s_id?}','CategoryController@index');
    });
    Route::group(['prefix' => 'goods'],function (){
        Route::get('/','GoodsController@index');
        Route::get('/ajaxIndex','GoodsController@ajaxIndex');
        Route::get('/category/{category_id}/category_s/{category_s_id}','GoodsController@category');
        Route::get('/ajaxcategory','GoodsController@ajaxCategory');

        Route::get('/{goods_id}/detail','GoodsController@detail');
    });
    Route::group(['prefix' => 'needs'],function (){
        Route::get('/','NeedsController@index');
        Route::get('/ajaxIndex','NeedsController@ajaxIndex');
        Route::get('/category/{category_id}/category_s/{category_s_id}','NeedsController@category');
        Route::get('/ajaxcategory','NeedsController@ajaxCategory');

        Route::get('/{needs_id}/detail','NeedsController@detail');
    });
    Route::group(['prefix' => 'img'],function () {
        Route::get('/','ImgController@index');
    });
    Route::group(['prefix' => 'contact'],function () {
        Route::get('/mail/{email}','ContactController@showMailForm');
        Route::post('/mail', 'ContactController@sendMailInfo');
    });




    Route::get('/comment','CommentController@index');
    Route::get('/img','ImgController@index');
    Route::get('/needs','NeedsController@index');
});

Route::group(['prefix' => 'model'],function (){
    Route::get('/img',function (){ dd(\App\Model\Img::all()); });
    Route::get('/goods',function (){ dd(\App\Model\Goods::all()); });
    Route::get('/user',function (){ dd(\App\Model\User::all()); });
    Route::get('/category',function (){ dd(\App\Model\Category::all()); } );
    Route::get('/category_s',function (){ dd(\App\Model\Category_s::all()); } );
    Route::get('/needs',function (){ dd(\App\Model\Needs::all()); } );
    Route::get('/collection',function (){ dd(\App\Model\Collection::all()); } );
    Route::get('/img',function (){ dd(\App\Model\Img::first()); } );
    Route::get('/comment',function (){ dd(\App\Model\Comment::all()); } );
    Route::get('/reply',function (){ dd(\App\Model\Reply::all()); } );
    Route::get('/praise',function (){ dd(\App\Model\Praise::all()); } );
});

Route::get('/search',function (){
    if (Request::ajax()){
        return 'HAHAHA';
    };
});

Route::get('/test',function (){
    dd(\App\Model\Category_s::find(5)->belongsToCategory()->first());
});
Route::post('/register',function (){
    if (Request::ajax()){
        return var_dump(Response::json(Request::all()));
    };
});

Route::group(['prefix' => 'ajax', 'namespace' => 'Ajax'],function (){
    Route::post('test','TestController@test');
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

