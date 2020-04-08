<?php

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

/* Route::post('/employee', 'EmployeeController@store');
Route::patch('/employee/{id}', 'EmployeeController@update'); */


Route::resource('/employee', 'EmployeeController');
Route::resource('/organization', 'MasterFiles\OrganizationController');
/* Route::resource('organization', 'OrganizationController'); */
/* 
Route::patch('/employee', 'EmployeeController@update');
Route::resource('/employee', 'EmployeeController'); */
/* Route::match(['get', 'post', 'put'], '/employee', function () {
    //
}); */
/* Route::resources([
    '/employee' => 'EmployeeController@store',
    'posts' => 'PostController'
]); */