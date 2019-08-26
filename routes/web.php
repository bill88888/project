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

Route::get('/', function () {
    return view('welcome');
});
//登录
Route::resource('/adminlogin','Admin\AdminLoginController');

//后台路由组
Route::group(['middleware'=>'adminlogin'],function(){
	//后台首页
	Route::resource('/admin','Admin\AdminController');
	//后台用户管理
	Route::resource('/adminusers','Admin\UsersController');
	Route::get('/usersaddress/{id}','Admin\UsersController@address');
	Route::get('/usersinfo/{id}','Admin\UsersController@info');
	Route::get('/deladdress/{id}','Admin\UsersController@deladdress');
	//后台分类管理
	Route::resource('/admincates','Admin\CatesController');
	//后台管理员管理
	Route::resource('/adminuser','Admin\UserController');
	//分配管理角色
	Route::get("/adminuserrole/{id}",'Admin\UserController@adminuserrole');
	//保存添加管理角色
	Route::post('/adminrsave','Admin\UserController@adminrsave');
	//管理员角色管理
	Route::resource('/adminrole','Admin\RoleController');
	//分配权限
	Route::get('/adminroleauth/{id}','Admin\RoleController@adminroleauth');
	//保存添加角色权限
	Route::post('/adminnsave','Admin\RoleController@adminnsave');
	//角色权限管理
	Route::resource('/adminauth','Admin\AuthController');
	//公告管理
	Route::resource('/adminarticles','Admin\ArticlesController');
	//公告ajax批量删除
	Route::get('/articlesdel','Admin\ArticlesController@del');
	//商品管理
	Route::resource('/adminshops','Admin\ShopsController');
	//订单管理
	Route::resource('/adminorders','Admin\OrdersController');
	Route::get('/orderinfo/{id}','Admin\OrdersController@orderinfo');
	//状态更改
	Route::get('/status','Admin\OrdersController@status');
	//评价管理
	Route::resource('/admineva','Admin\EvaController');
	//轮播图管理
	Route::resource('adminlun','Admin\LunController');


	//友情链接管理
	Route::resource('adminblogroll','Admin\BlogrollController');
});

//前台登录
Route::resource('/homelogin','Home\HomeLoginController');
//前台邮箱注册-----------------------------------
Route::resource('/emailregister','Home\RegisterController');
//验证码
Route::get('/code','Home\RegisterController@code');
//激活成功跳转
Route::get('/activate','Home\RegisterController@activate');
//前台手机注册----------------------------------
Route::post('/phoneregister','Home\RegisterController@phoneregister');
//手机注册电话唯一
Route::get('/phonecheck','Home\RegisterController@phonecheck');
//手机注册发送
Route::get('/phonesend','Home\RegisterController@phonesend');
//验证码检查
Route::get('/codecheck','Home\RegisterController@codecheck');
//忘记密码------------------------------------
Route::get('/forget','Home\HomeLoginController@forget');
Route::post('/doforget','Home\HomeLoginController@doforget');
//重置密码
Route::get('/reset','Home\HomeLoginController@reset');
Route::post('/doreset','Home\HomeLoginController@doreset');
Route::get('/okreset','Home\HomeLoginController@okreset');
//前台首页
Route::resource('/index','Home\IndexController');
Route::post('/fenso','Home\IndexController@fenso');	
Route::group(['middleware'=>'homelogin'],function(){
	//个人中心
	Route::get('/selfcenter','Home\IndexController@selfcenter');
	Route::get('/evaluate/{id}','Home\IndexController@evaluate');
	//支付
	Route::get('/pay/{num}','Home\IndexController@pay');
	//确认收货
	Route::get('/sgoods/{id}','Home\IndexController@sgoods');
	//提醒发货
	Route::get('/fgoods/{id}','Home\IndexController@fgoods');
	//购物车---------------------------
	Route::resource('/homecart','Home\CartController');
	//购物车全部删除
	Route::get('/alldel','Home\CartController@alldel');
	//购物车单个删除
	Route::get('/del','Home\CartController@del');
	//购物车减1
	Route::get('/subtract','Home\CartController@subtract');
	//购物车加1
	Route::get('/add','Home\CartController@add');
	//选中购物车商品 总金额和数量
	Route::get('/homecarttot','Home\CartController@carttot');
	//跳转结算页中ajax判断---------------------------------
	Route::get('/account','Home\OrderController@account');
	//结算页面 页面显示&提交订单
	Route::resource('/homeorder','Home\OrderController');
	//城市级联
	Route::any('/city','Home\AddressController@city');
	//添加收货地址
	Route::resource('/address','Home\AddressController');
	//选择收货地址
	Route::get('/selectaddress','Home\AddressController@selectaddress');
	//支付宝支付完成跳转
	Route::get('/payok','Home\OrderController@payok');
});
