<?php
use RealRashid\SweetAlert\Facades\Alert;

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

// Route::get('/', function () {
//     Alert::success('Success Title', 'Success Message');

//     return view('welcome');
// });

Auth::routes();

// Notifications controller
Route::get('/dashboard/notification', 'NotificationsController@index');
// Route::get('/dashboard/notification1', 'NotificationsController@index1');
Route::post('/m', 'NotificationsController@message');


// prediction controller
Route::get('/prediction', 'PredictionController@index');

// Route::get('/dashboard', 'DashboardController@approve');
Route::get('/dashboard', 'DashboardController@index');
Route::get('dashboard/posts/show', 'DashboardController@show');
Route::get('/dashboard/approve', 'DashboardController@approveShow');
Route::get('status/{id}', 'DashboardController@status')->name('status');
// Route::get('/dashboard', 'PostsController@dashboard');


// Post Controller
Route::get('/news', 'PostsController@index');
Route::get('/search', 'PostsController@search')->name('search');
Route::get('/p/create', 'PostsController@create');
Route::post('/p', 'PostsController@store');
Route::post('/s', 'PostsController@status');
Route::get('/p/{post}', 'PostsController@show');


// Profile Controller
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile/{user}', 'ProfilesController@index')->name('profile.show');
Route::get('/profile/{user}/pic', 'ProfilesController@pic')->name('profile.pic');
Route::get('/profile/{user}/edit', 'ProfilesController@edit')->name('profile.edit');
Route::patch('/profile/{user}', 'ProfilesController@update')->name('profile.update');

Route::get('/posts/{post}/edit', 'PostsController@edit')->name('post.edit');//post edit
Route::patch('/posts/{id}', 'PostsController@update')->name('post.update');//post update

Route::get('/posts/{post}/editStatus', 'PostsController@editStatus')->name('post.editStatus');//status edit
Route::patch('/posts1/{id}', 'PostsController@updateStatus')->name('post.updateStatus');//status update

Route::delete('/delete/{id}', 'PostsController@destroy')->name('post.destroy');//delete photo and caption
Route::delete('/deletestatus/{id}', 'PostsController@destroyStatus')->name('post.destroyStatus');//delete status

Route::delete('/deleteuserpost/{id}', 'DashboardController@destroy')->name('dashboard.destroy');



Route::get('invoice', function(){
    return view('invoice');
});
Route::get('{path}', 'HomeController@index')->where( 'path' , '([A-z\d\-\/_.]+)?' );
// Route::get('{path}','HomeController@index')->where( 'path', '([A-z]+)?' );
