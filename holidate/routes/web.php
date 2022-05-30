<?php

use App\Category;
use App\User;
use App\Post;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
// use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Spatie\Searchable\Search;
use Stichoza\GoogleTranslate\GoogleTranslate;


// Route::get('clear-cache', function () {
// 	$exitCode = Artisan::call('config:clear');
// 	$exitCode = Artisan::call('cache:clear');
// 	$exitCode = Artisan::call('route:clear');
// 	$exitCode = Artisan::call('view:clear');
// 	$exitCode = Artisan::call('config:cache');
// 	$exitCode = Artisan::call('migrate:fresh');
// 	$exitCode = Artisan::call('db:seed');
// 	echo "DONE";
// });
Auth::routes();
Route::get('update-site', function () {
	$data['content'] = 'errors.comming-soon';
	return view('layouts.content', compact('data'));
});

// Route::get('forgotpassword', function () {
// 	App::setLocale(session()->get('locale'));
// 	return view('holidates_web.forgotpassword');	
// });


Route::any('edit-userprofile', 'HomeController@UpdateProfile');
Route::get('dashboard', 'HomeController@Dashboard');
/* users all routes start */
Route::any('users', 'HomeController@user_view');
Route::any('add-user', 'UserController@add_user');
Route::any('delete-user/{id}', 'HomeController@user_delete');
Route::any('public-data', 'HomeController@public_data');
Route::any('home-search', 'HomeController@home_search');
Route::any('addcategory', 'HomeController@add_category');
Route::any('useremail/{y}', 'HomeController@useremail');
/* users all routes End */
Route::POST('check-email-exist', 'HomeController@checkemailexist');






Route::get('all_category', 'CategoryController@index')->name('category.showall');
Route::get('category/{id}', 'CategoryController@show')->name('category.show');
Route::get('/all_people', 'UserController@allpeople')->name('allpeople');
Route::get('/latest_publications', 'UserController@latest_publications')->name('latest_publications');


Route::any('home/search', 'UserController@search')->name('home.search');
Route::any('home/search/{id}', 'UserController@search_cat')->name('home.search.cat');

Route::group(['middleware' => 'auth'], function (){
	Route::get('/admin/category/create', 'CategoryController@create')->name('category.create');
	Route::any('/admin/category/delete/{id}', 'CategoryController@destroy')->name('category.destroy');
    Route::post('category/store', 'CategoryController@store')->name('category.store');
    
    Route::get('/people/connect/{id}', 'UserController@connect')->name('connect');
    Route::get('user/event/create', 'EventController@create')->name('event.create');
    Route::POST('user/event/store', 'EventController@store')->name('event.store');
    Route::POST('user/addpost', 'PostController@store')->name('post.store');
    Route::POST('user/updatepost', 'PostController@update')->name('post.update');
    Route::get('user_profile', 'ProfileController@user_profile')->name('user.profile');
    Route::post('user_profile/profile-pic-update', 'ProfileController@user_profile_pic_edit')->name('user.profile-pic-update');
    Route::get('user_profile/edit', 'ProfileController@edit')->name('user.profile.edit');
    Route::POST('user_profile/update', 'ProfileController@update')->name('user.profile.update');
	Route::POST('user_profile_password/update', 'ProfileController@updatepassword')->name('user.profile.password.update');
	
	Route::POST('user/business_update', 'BusinessController@update')->name('user.business.update');
});

/* Web home page  Routes Start */
Route::get('/', function(){
// 	App::setLocale(session()->get('locale'));
// 	$users = User::all();
// 	return view('home', compact('users'));
    if(session()->get('locale') == null){
		App::setlocale('es');
		session()->put('locale', 'es');
	} else{
		App::setLocale(session()->get('locale'));
	}
	$users = User::all()->take(4);
	$categories = Category::paginate(12);
	$latest_users = Post::orderBy('created_at', 'desc')->take(4)->get();
	return view('holidates_web.home', compact('users', 'categories', 'latest_users'));	
});
Route::get('add-category', function () {
	App::setLocale(session()->get('locale'));
	return view('holidates_web.add_category');	
});

Route::get('home', function () {
	if(session()->get('locale') == null){
		App::setlocale('es');
		session()->put('locale', 'es');
	} else{
		App::setLocale(session()->get('locale'));
	}
	$users = User::all()->take(4);
	$categories = Category::paginate(12);
	$latest_users = Post::orderBy('created_at', 'desc')->take(4)->get();
	return view('holidates_web.home', compact('users', 'categories', 'latest_users'));	
});
Route::get('searchdata', function () {
	App::setLocale(session()->get('locale'));
	return view('holidates_web.search_data');	
});
// Route::get('user_profile', function () {
// 	return view('holidates_web.profile');
// });
// Route::get('allevents', function () {
// 	App::setLocale(session()->get('locale'));
// 	return view('holidates_web.all_events');	
// });
// Route::get('eventdetail/{id}', function ($id) {
// 	App::setLocale(session()->get('locale'));
// 	return view('holidates_web.notready')->with('id', $id);	
// });
Route::get('userdetail/{id}', function ($id) {
	App::setLocale(session()->get('locale'));
	return view('holidates_web.user_detail')->with('id', $id);	
});
Route::get('signup', function () {
	App::setLocale(session()->get('locale'));
	return view('holidates_web.signup.signup');	
});
Route::get('profile', function () {
	App::setLocale(session()->get('locale'));
	return view('holidates_web.signup.profile');	
});	
Route::get('login_web', function () {
	App::setLocale(session()->get('locale'));
	return view('holidates_web.Login.login');	
})->name('login_web');
Route::get('view-all-users', function () {
	App::setLocale(session()->get('locale'));
	return view('holidates_web.all_users');	
});
Route::get('/not-available', function () {
	App::setLocale(session()->get('locale'));
	return view('holidates_web.notready');	
});
// admin panel here
// Route::middleware('can:hasAuth')->group(function () {
// 	Route::get('/admin_panel', function(){
// 		return view('admin.index');
// 	});
// });

/* SUPER ADMIN */

/* //SUPER ADMIN */
Route::get('/adminpanel', 'AdminController@login')->name('admin.login');
Route::prefix('adminpanel')->name('adminpanel.')->group(function () {
	// App::setLocale(session()->get('locale'));
	Route::get('/dashboard', 'AdminController@dashboard')->name('dashboard');
	Route::get('/users/search', 'AdminController@search_user')->name('user.search');
	Route::get('/users', 'AdminController@users')->name('users');
	Route::post('/user_update', 'AdminController@update_user')->name('user.update');
	Route::post('/user_update_image', 'AdminController@update_user_image')->name('user.image.update');
	Route::post('/user_update_password', 'AdminController@update_user_password')->name('user.updatepassword');
	Route::any('/user/delete/{id}', 'AdminController@delete_user')->name('user.delete');
	Route::get('/posts', 'AdminController@posts')->name('posts');
	Route::post('/post/update', 'AdminController@post_update')->name('post.update');
	Route::any('/post/delete/{id}', 'AdminController@delete_post')->name('post.delete');
	Route::get('/categories', 'AdminController@categories')->name('categories');
	Route::post('/category/store', 'AdminController@category_store')->name('category.store');
    Route::post('/category/update', 'AdminController@category_update')->name('category.update');
	Route::any('/category/delete/{id}', 'AdminController@category_delete')->name('category.destroy');
	Route::get('/report', 'AdminController@filterWeekly')->name('report');
	/*  */
	Route::get('/filter/weekly', 'AdminController@filterWeekly')->name('filter.weekly');
	Route::get('/filter/Monthly', 'AdminController@filterMonthly')->name('filter.monthly');
	Route::get('/filter/Quarterly', 'AdminController@filterQuarterly')->name('filter.quarterly');
});
// end admin panel here

// Route::group(['prefix' => 'es'], function(){
// 	Route::get('home', function () {
// 		App::setLocale('es');
// 		$users = User::all()->take(4);
// 		$categories = Category::paginate(12);
// 		return view('holidates_web.home', compact('users', 'categories'));	
// 	});
// 	Route::get('signup', function () {
// 		return view('holidates_web.signup.signup');	
// 	});
// 	Route::get('login_web', function () {
// 		return view('holidates_web.Login.login');	
// 	})->name('login_web');
// });
Route::get('/es', function(){
	session()->put('locale', 'es');
	App::setLocale(session()->get('locale'));
	return back();
});
Route::get('/en', function(){
	session()->put('locale', 'en');
	App::setLocale(session()->get('locale'));
	return back();
});