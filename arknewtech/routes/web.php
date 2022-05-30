<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
 */
Route::get('/', function () {
    return view('auth.login');
});
// Route::get('/home', function () {
//     return view('welcome');
// });
//Auth::routes();
Auth::routes(['verify' => true]);
Route::get('/validate-user', 'HomeController@checkUserRole');

/*=====================================ADMIN=====================================*/
Route::group(['prefix' => 'admin', 'middleware' => ['admin', 'auth']], function () {
    
    Route::get('/', 'Admin\DashboardController@index');
    /*
    |---------------------------------
    | Employee Management Routes Here     |
    |---------------------------------
     */
    
   
});




