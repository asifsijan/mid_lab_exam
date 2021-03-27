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

Route::get('/', function () {
    return view('welcome');
});



Route::get('/home', function () {

	$cars = App\Car::orderBy('id', 'desc')->paginate(5);

    return view('home', [
        'cars' => $cars
    ]);
});







Route::get('/admin/register', 'AdminController@index');
Route::post('/admin/register', 'AdminController@store');


Route::get('/admin/login', 'AdminController@login');
Route::post('/admin/login', 'AdminController@verify');
Route::get('/admin/home', 'AdminController@home');
Route::get('/admin/logout', 'AdminController@logout');


Route::get('/admin/car', 'AdminController@addCar');
Route::post('/admin/car', 'AdminController@storeCar');










Route::get('/member/register', 'MemberController@index');
Route::post('/member/register', 'MemberController@store');


Route::get('/member/login', 'MemberController@login');
Route::post('/member/login', 'MemberController@verify');
Route::get('/member/home', 'MemberController@home');
Route::get('/member/logout', 'MemberController@logout');

