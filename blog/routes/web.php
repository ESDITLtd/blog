<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/','WelcomeController@index');
Route::get('portfolio.java','WelcomeController@Portfolio');
Route::get('service.php','WelcomeController@Service');
Route::get('contact.aspx','WelcomeController@Contact');

Route::get('/login.aspx','AdminController@index');
Route::post('/admin_login_check.aspx','AdminController@admin_login_check');
Route::get('/dashboard.aspx','SuperAdminController@index');
Route::get('/add_category.aspx','SuperAdminController@add_category');
Route::get('/add_subcategory.aspx','SuperAdminController@add_sub_category');
Route::get('get-subcategory-by-categoryid/{id}','SuperAdminController@get_subCategory_by_categoryid');


Route::post('/save_category.aspx','SuperAdminController@save_category');
Route::get('/logout.aspx','SuperAdminController@logout');
               
Route::get('/test.aspx','SuperAdminController@test');