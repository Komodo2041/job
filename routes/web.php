<?php

use Illuminate\Support\Facades\Route;

Route::get( '/jobs', "App\Http\Controllers\MainController@list" );

Route::match(["get", "post"], '/jobs/add', "App\Http\Controllers\JobController@add" );
Route::match(["get", "post"], '/jobs/edit/{id}', "App\Http\Controllers\JobController@edit" );
Route::get( '/jobs/delete/{id}', "App\Http\Controllers\JobController@delete" );