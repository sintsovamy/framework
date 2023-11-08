<?php

use Src\Route;

Route::add('POST', '/echo', [Controller\Api::class, 'echo']);
Route::add('POST', '/login', [Controller\Api::class, 'login']);
Route::add('POST', '/signup', [Controller\Api::class, 'signup']);
Route::add('GET', '/posts', [Controller\Api::class, 'index']);
