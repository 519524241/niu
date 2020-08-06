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
	// 文章列表
	Route::rule('/articlelist','admin/index/articlelist','get|post');
	// 删除文章
	Route::rule('/articlelist/del','admin/index/delArticlelist','get');
	// 添加文章列表
	Route::rule('/articlelist/add/index','admin/index/addArticle','get');
	Route::rule('/articlelist/add','admin/index/addArticlelist','post');
	// 栏目列表
	Route::rule('/cate','admin/cate/index');
	// 添加栏目
	Route::rule('/cateAdd','admin/cate/addCate','get|post');
	// 栏目添加提交
	// Route::rule('/cateAdd','admin/cate/addCate','post');
	// 编辑栏目
	Route::rule('/cateEdit','admin/cate/editCate','get|post');
	// 编辑文章
	Route::rule('/articlelistEdit','admin/index/editArticlelist');

});

Route::group("home",function() {
	Route::rule('/','home/index/index','get');
});
