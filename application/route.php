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
use think\Route;
Route::rule('test', 'admin/Index/login', 'get|post');
Route::rule('register','admin/Index/register','get|post');
Route::rule('home','admin/home/index','get|post');
Route::rule('loginout','admin/home/loginout','get|post');
Route::rule('catelist','admin/cate/list1','get|post');
Route::rule('cateadd','admin/cate/add','get|post');
Route::rule('sort','admin/cate/sort','get|post');
Route::rule('edit/[:id]','admin/cate/edit','get|post');
Route::rule('del','admin/cate/del','get|post');
Route::rule('list','admin/article/list1','get|post');
Route::rule('add','admin/article/add','get|post');
Route::rule('rec','admin/article/rec','get|post');
Route::rule('articleEdit/[:id]','admin/article/edit','get|post');
Route::rule('article/del','admin/article/del','get|post');
Route::rule('memberlist','admin/member/list1','get|post');
Route::rule('memberadd','admin/member/add','get|post');
Route::rule('memberedit','admin/member/edit','get|post');
Route::rule('memberdel','admin/member/del','get|post');
Route::rule('adminlist','admin/admin/list1','get|post');
Route::rule('adminadd','admin/admin/add','get|post');
Route::rule('adminstatus','admin/admin/status','post');
Route::rule('admindel','admin/admin/del','get|post');
Route::rule('commentlist','admin/comment/list1','get|post');
Route::rule('commentdel','admin/comment/del','get|post');

Route::rule('cate/[:id]','index/index/index','get|post');
Route::rule('/','index/index/index','get');
Route::rule('article-<id>','index/article/info','get|post');
Route::rule('registerindex','index/index/register','get|post');
