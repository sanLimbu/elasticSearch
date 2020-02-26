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
use App\User;
use Illuminate\Http\Request;
Route::get('/', function (Request $request) {
    //User::find(3)->delete();
    $users = User::search($request->q)->keys();
    dd($users);
});
