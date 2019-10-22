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



Route::get('/', function () {
    $channels = DB::table('channels')->get()->toArray();
    $purge =[];
    foreach($channels as $chan){
        array_push($purge, $chan->name);
    }
    //dd(json_encode(array_values($purge)));
    return view('welcome', ['channels' => json_encode(array_values($purge))]);
});
