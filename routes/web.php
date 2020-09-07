<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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



Auth::routes();


Route::group(['middleware' => 'auth'], function() {

   
});

Route::get('/home', 'HomeController@index')->name('home');

route::get('/admin','AdminController@index')->name('admin');

route::get('/admin/exam/category','AdminController@exam_category')->name('admin-exam-category');

route::post('/admin/add/new/category','AdminController@add_new_category')->name('add-new-category');

route::get('/admin/delete/category/{id}','AdminController@delete_category')->name('delete-category');

route::get('/admin/edit/category/{id}','AdminController@edit_category')->name('edit-category');

route::post('/admin/update/category','AdminController@update_category')->name('update-category');

route::get('/admin/category_status/{id}','AdminController@category_status');


route::get('/admin/manage/exam','AdminController@manage_exam')->name('admin-manage-exam');

route::post('/admin/add/new/exam','AdminController@add_new_exam')->name('add-new-exam');

route::get('/admin/exam_status/{id}','AdminController@exam_status');

route::get('/admin/delete/exam/{id}','AdminController@delete_exam')->name('delete-exam');

route::get('/admin/edit/exam/{id}','AdminController@edit_exam')->name('edit-exam');

route::post('/admin/update/exam','AdminController@update_exam')->name('update-exam');


route::get('/admin/manage/students','AdminController@manage_students')->name('manage-students');

route::post('/admin/add/new/students','AdminController@add_new_students')->name('add-new-students');

route::get('/admin/student_status/{id}','AdminController@student_status');

route::get('/admin/delete/students/{id}','AdminController@delete_students')->name('delete-students');

route::get('/admin/edit/students/{id}','AdminController@edit_students')->name('edit-students');

route::post('/admin/update/students','AdminController@update_students')->name('update-students');


route::get('/admin/manage/portal','AdminController@manage_portal')->name('manage-portal');

route::post('/admin/add/new/portal','AdminController@')->name('add-new-portal');

route::get('/admin/portal_status/{id}','AdminController@portal_status');

route::get('/admin/delete/portal/{id}','AdminController@delete_portal')->name('delete-portal');



