<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome', ['greeting' => 'Hello Pedro!']);
});

Route::get('/users', function() {
	return [
		'total' => 2,
		'fresh' => true,
		['id' => 1, 'name' => 'pedro'],
		['id' => 2, 'name' => 'ana'],
	];
});