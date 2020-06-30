<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
// 后台首页
// Route::rule('/admin','admin/index/index')
// 	->middleware('check');
// 路由组
Route::group("admin",function() {
	// 首页
	Route::rule('/','admin/index/index')
	->middleware('check');
	// 登录
	Route::rule('/login','admin/index/login','get|post');
	// 退出登录
	Route::rule('/logOut','admin/index/logOut');
	// 注册页面
	Route::rule('/register','admin/index/register','get|post');

});

Route::group("home",function() {
	Route::rule('/','home/index/index','get');
});
