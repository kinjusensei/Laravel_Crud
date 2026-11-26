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

Route::get('/', 'Membercontroller@activeuser');
Route::get('/archived', 'Membercontroller@archive');
Route::get('/form', 'Membercontroller@registeruser');
Route::get('/delete/{id}', 'Membercontroller@hide');
Route::get('/update/{id}', 'Membercontroller@update_form');
//POST Routes
Route::post('/form', 'Membercontroller@SaveToDatabase');
Route::post('/update/{id}', 'Membercontroller@update');
//For Archives
Route::delete('/delete/{id}', 'Membercontroller@hide')->name('Members.hide');
Route::post('/restore/{id}', 'Membercontroller@restore')->name('Members.restore');
// Route::get('/', 'Controller');

