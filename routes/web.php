<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
*/
//首页
Route::get ( "/", "IndexController@index" );
Route::get('/web',"IndexController@web");
Route::get('/app',"IndexController@app");


//文章列表页
Route::get('/posts','PostController@index' );
//文章详情页
Route::get('/posts/{post}','PostController@show')->where('post','[0-9]+');
// 注册页面
Route::get ('/register', 'RegisterController@index');
// 注册行为
Route::post ('/register', 'RegisterController@register');
// 登录页面
Route::get ('/login', 'LoginController@index');
// 登录行为
Route::post ('/login', 'LoginController@login');

//需要登录验证的页面
Route::group ([
	'middleware' => 'auth'
	],function(){
		//登出行为
		Route::get('/logout','LoginController@logout' );
		Route::get('/u8',"IndexController@u8");
		//初始化页面
		Route::get('ys/index',"YsController@index");

		//个人设置
		Route::get('/user/me/setting','UserController@setting' );
		//个人设置操作
		Route::post('/user/me/setting','UserController@settingStore' );

		//创建文章
		Route::post('/posts','PostController@store' );
		Route::get('/posts/create','PostController@create' );
		// 文章搜索页
		Route::post('/posts/search', 'PostController@search');
		//更新文章
		Route::get('/posts/{post}/edit','PostController@edit')->where('post','[0-9]+');
		Route::put('/posts/{post}','PostController@update' )->where('post','[0-9]+');
		//删除文章
		Route::get('/posts/{post}/delete','PostController@delete' )->where('post','[0-9]+');
		
		//图片上传
		Route::post('/posts/image/upload','PostController@imageUpload');
		//提交评论
		Route::post('/posts/{post}/comment','PostController@comment')->where('post','[0-9]+');
		// 赞
		Route::get('/posts/{post}/zan', 'PostController@zan')->where('post','[0-9]+');
		// 取消赞
		Route::get('/posts/{post}/unzan', 'PostController@unzan')->where('post','[0-9]+');

		//个人中心
		Route::get('/user/{user}', 'UserController@show')->where('user','[0-9]+');
		//关注
		Route::post('/user/{user}/fan', 'UserController@fan')->where('user','[0-9]+');
		//取消关注
		Route::post('/user/{user}/unfan', 'UserController@unfan')->where('user','[0-9]+');

		//专题详情页
		Route::get('/topic/{topic}', 'TopicController@show')->where('topic','[0-9]+');
		//投稿
		Route::post('/topic/{topic}/submit', 'TopicController@submit')->where('topic','[0-9]+');
		// 通知
		Route::get('/notices', 'NoticeController@index');
});



Route::group([
    'prefix'=>'camp',
],function(){
    //版本号
    Route::get('/version', 'VersionController@index');
    Route::match(['get','post'],'version/{version}/edit','VersionController@edit')->where('version','[0-9]+');
    Route::match(['get','post'],'version/create','VersionController@create');
    Route::get('version/{version}/del','VersionController@destroy')->where('version','[0-9]+');
    //集成号
    Route::get('/integrate/version/{version}', 'IntegrateController@index')->where('version','[0-9]+');
    Route::match(['get','post'],'integrate/{integrate}/edit/{version}','IntegrateController@edit')
        ->where(['integrate','[0-9]+'],['version','[0-9]+']);
    Route::match(['get','post'],'integrate/create/{version}','IntegrateController@create')->where('version','[0-9]+');
    Route::get('integrate/{integrate}/del/{version}','IntegrateController@destroy')
        ->where(['integrate','[0-9]+'],['version','[0-9]+']);
    //资源数据
    Route::get('/resource/{integrate}/{version}/{enumType}', 'ResourceController@index')
        ->where(['integrate','[0-9]+'],['version','[0-9]+'],['enumType','[0-9]+']);
    Route::match(['get','post'],'resource/{resource}/edit/{integrate}/{version}/{enumType}','ResourceController@edit')
        ->where(['resource','[0-9]+'],['integrate','[0-9]+'],['version','[0-9]+'],['enumType','[0-9]+']);
    Route::match(['get','post'],'resource/{resource}/show/{integrate}/{version}/{enumType}','ResourceController@show')
        ->where(['resource','[0-9]+'],['integrate','[0-9]+'],['version','[0-9]+'],['enumType','[0-9]+']);
    Route::match(['get','post'],'resource/{resource}/copy/{integrate}/{version}/{enumType}','ResourceController@copy')
        ->where(['resource','[0-9]+'],['integrate','[0-9]+'],['version','[0-9]+'],['enumType','[0-9]+']);
    Route::match(['get','post'],'resource/create/{integrate}/{version}/{enumType}','ResourceController@create')
        ->where(['integrate','[0-9]+'],['version','[0-9]+'],['enumType','[0-9]+']);
    Route::get('resource/{resource}/del/{integrate}/{version}/{enumType}','ResourceController@destroy')
        ->where(['resource','[0-9]+'],['integrate','[0-9]+'],['version','[0-9]+'],['enumType','[0-9]+']);
     Route::match(['get','post'],'resource/upload/{integrate}/{version}/{enumType}','ResourceController@upload')
        ->where(['integrate','[0-9]+'],['version','[0-9]+'],['enumType','[0-9]+']);
    Route::match(['get','post'],'resource/download','ResourceController@download');
});


/**
 * YonSuite质量全景分析
 */

    Route::group ( [
        'prefix' => 'ys',
    ], function () {
        //初始化版本号
        Route::get('/getVersion',"VersionController@getVersion");
        //初始化集成号
        Route::get('/getIntegrate',"IntegrateController@getIntegrate");
        //获取资源
        Route::get('/getYSResource',"YsController@getYSResource");

    } );



//测试工具链接基下载
Route::group ( [
    'prefix'=>'camp',
    'middleware' => 'auth'
], function () {
    Route:: resource( "/ult", "U8Controller@ult" );
    Route:: resource( "/mtt", "U8Controller@mtt" );
    Route:: resource( "/sett", "U8Controller@sett" );
    Route:: resource( "/dult", "U8Controller@dult" );
    Route:: resource( "/pct", "U8Controller@pct" );
    Route:: resource( "/js", "U8Controller@js" );
    Route:: resource( "/lsbcx", "U8Controller@lsbcx" );
    Route:: resource( "/gdi", "U8Controller@gdi" );
    Route:: resource( "/sjkjgdb", "U8Controller@sjkjgdb" );
    Route:: resource( "/wj", "U8Controller@wj" );
    Route:: resource( "/xn", "U8Controller@xn" );
    Route:: resource( "/ylzx", "U8Controller@ylzx" );
} );



// 管理后台
Route::group([
	'prefix' => 'back',
	'namespace' => '\App\Back\Controllers' 
	], function(){
    // 登录展示页面
    Route::get('/login', 'LoginController@index');
    // 登录行为
    Route::post('/login', 'LoginController@login');
    // 登出行为
    Route::get('/logout', 'LoginController@logout');

    Route::group(['middleware' => 'auth:back'], function(){
        // 首页
        Route::get('/home', 'HomeController@index');

        Route::group(['middleware' => 'can:system'], function(){
            // 管理人员模块
            Route::get("/users", 'UserController@index');
            Route::get("/users/create", 'UserController@create');
            Route::post("/users/store", 'AppUserController@store');
            Route::get("/users/{user}/role", 'UserController@role');
            Route::post("/users/{user}/role", 'UserController@storeRole');
            // 角色
            Route::get("/roles", 'RoleController@index');
            Route::get("/roles/create", 'RoleController@create');
            Route::post("/roles/store", 'RoleController@store');
            Route::get("/roles/{role}/permission", 'RoleController@permission');
            Route::post("/roles/{role}/permission", 'RoleController@storePermission');
            // 权限
            Route::get("/permissions", 'PermissionController@index');
            Route::get("/permissions/create", 'PermissionController@create');
            Route::post("/permissions/store", 'PermissionController@store');
        });

        Route::group(['middleware' => 'can:post'], function() {
            // 审核模块
            Route::get('/posts', 'PostController@index');
            Route::post('/posts/{post}/status', 'PostController@status');
        });

        Route::group(['middleware' => 'can:topic'], function() {
            Route::resource('topics', 'TopicController', ['only' => ['index', 'create', 'store', 'destroy']]);
        });

        Route::group(['middleware' => 'can:notice'], function() {
            Route::resource('notices', 'NoticeController', ['only' => ['index', 'create', 'store']]);
        });
    });

});



/**
 * 兜底路由，一般默认404页面
 */

Route::fallback(function () {
    //TODO
});
