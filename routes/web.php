<?php

Route::get('/', 'HomeController@index');

Route::get('/clubes', 'ClubeController@index');
Route::get('/clubes/create', 'ClubeController@create');
Route::post('/clubes', 'ClubeController@store');
Route::delete('/clubes/{id}', [
   'uses' => 'ClubeController@destroy',
   'as' => 'clubes.destroy',
]);

Route::get('/socios', 'SocioController@index');
Route::get('/socios/create', 'SocioController@create');
Route::post('/socios', 'SocioController@store');
Route::delete('/socios/{id}', [
    'uses' => 'SocioController@destroy',
    'as' => 'socios.destroy',
]);
