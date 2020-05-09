<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});


Route::resource('trabajadors', 'TrabajadorController', ['only' => ['index', 'show', 'update']]);
