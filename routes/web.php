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
Route::get('test', function () {
		return view('welcome');
    	
});


Route::get('admin/login','LoginController@getLogin');
Route::post('admin/login','LoginController@postLogin');
Route::get('admin/logout','LoginController@logout');

Route::group(['prefix'=>'admin','middleware'=>'adminLogin'],function(){
	Route::get('home', function () {
		return view('admin.page.home');
	});
	Route::group(['prefix'=>'pages'],function(){

		Route::group(['prefix'=>'category'],function (){
			Route::get('listcategory','CategoryController@getCategory')->middleware('can:viewcategory');
			Route::get('addcategory','CategoryController@addCategory')->middleware('can:addcategory');
			Route::post('addcategory','CategoryController@postAddCategory');
			route::get('editcategory/{id}','CategoryController@getEditCategory')->middleware('can:editcategory');
			route::post('editcategory/{id}','CategoryController@postEditCategory');
			Route::delete('delete-multiple-category', ['as'=>'category.multiple-delete','uses'=>'CategoryController@deleteMultiple'])->middleware('can:deletecategory');

		});

		Route::group(['prefix'=>'posts'],function (){
			Route::get('listposts','PostsController@getPosts')->name('get.list.posts')->middleware('can:viewposts');
			Route::get('listpost/{id}','PostsController@getPost')->name('get.one.post')->middleware('can:viewposts');
			Route::get('addposts','PostsController@getAddPost')->middleware('can:addposts');
			Route::post('addtintuc','PostsController@postAddPost')->name('post.add.posts');
			route::get('editposts/{id}','PostsController@getEditPost')->middleware('can:editposts');
			route::post('editposts','PostsController@postEditPost')->name('post.edit.posts');
			Route::delete('delete-multiple-tintuc','PostsController@deleteMultiple')->name('delete-multiple-posts')->middleware('can:deleteposts');

		});
		Route::group(['prefix'=>'slide'],function (){
			Route::get('listslide','SlideController@getSlide')->middleware('can:viewslide');
			Route::get('addslide','SlideController@getAddSlide')->middleware('can:addslide');
			Route::post('addslide','SlideController@postAddSlide')->name('post.add.slide');
			route::get('editslide/{id}','SlideController@getEditSlide')->middleware('can:editslide');
			route::post('editslide','SlideController@postEditSlide')->name('post.edit.slide');
			Route::delete('delete-multiple-slide','SlideController@deleteMultiple')->name('delete-multiple-slide')->middleware('can:deleteslide');
		});
		
		Route::group(['prefix'=>'user'],function(){
			Route::get('listuser','UserController@getUser')->name('get.list.user')->middleware('can:viewuser');
			Route::get('adduser','UserController@addUser')->middleware('can:adduser');
			Route::post('adduser','UserController@postAddUser');
			Route::get('edituser/{id}','UserController@editUser')->name('get.edit.user')->middleware('can:edituser');
			Route::post('edituser/{id}','UserController@postEditUser')->name('post.edit.user');
			Route::delete('delete-multiple-user', ['as'=>'user.multiple-delete','uses'=>'UserController@deleteMultiple'])->middleware('can:deleteuser');
			Route::get('changepass/{id}','UserController@changePass');
			Route::post('changepass/{id}','UserController@postChangePass');
		});
		Route::group(['prefix'=>'role'],function(){
			Route::get('listpermission','RoleController@getPermission')->name('get.list.permission');
			Route::get('listrole','RoleController@getRole')->name('get.list.role')->middleware('can:viewrole');
			Route::get('addrole','RoleController@getAddRole')->name('get.add.role')->middleware('can:addrole');
			Route::post('addrole','RoleController@postAddRole')->name('post.add.role');
			Route::get('editrole/{id}','RoleController@getEditRole')->name('get.edit.role')->middleware('can:editrole');
			Route::post('editrole/{id}','RoleController@postEditRole')->name('post.edit.role');
			Route::delete('deleteMitiple','RoleController@deleteMultipleRole')->name('delete.deleteMultipleRole')->middleware('can:deleterole');
		});	
	});
});
View::composer('*', function($view)
{
	$info = Auth::user();
    $view->with('userLogin', $info);
});


Route::get('trangchu', 'UIController@trangchu');
Route::get('loaitin/{id}','UIController@loaitin');
Route::get('chitiet/{id}', 'UIController@chitiet')->name('test');

Route::get('testdel','RoleController@delete');
