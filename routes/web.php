<?php

use Src\Route;
use Controller\Site;

Route::add('GET', '/hello', [Controller\Site::class, 'hello'])
   ->middleware('auth');
Route::add(['GET', 'POST'], '/signup', [Controller\Site::class, 'signup']);
Route::add(['GET', 'POST'], '/login', [Controller\Site::class, 'login']);
Route::add('GET', '/logout', [Controller\Site::class, 'logout']);
Route::add('GET', '/index', [Controller\Site::class, 'indexSisAdm']);
Route::add(['GET', 'POST'], '/indexAdmin', [Controller\Site::class, 'indexAdmin']);
