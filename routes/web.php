<?php

use Src\Route;
use Controller\Site;

Route::add(['GET', 'POST'], '/login', [Controller\Site::class, 'login']);
Route::add('GET', '/logout', [Controller\Site::class, 'logout']);
Route::add('GET', '/index', [Controller\Site::class, 'indexSisAdm']);
Route::add(['GET', 'POST'], '/indexAdmin', [Controller\Site::class, 'indexAdmin']);
Route::add(['GET', 'POST'], '/addNewUser', [Controller\Site::class, 'addNewUser']);
Route::add(['GET', 'POST'], '/users', [Controller\Site::class, 'users']);
Route::add(['GET', 'POST'], '/userPhones', [Controller\Site::class, 'userPhones']);
Route::add(['GET', 'POST'], '/departmentPhone', [Controller\Site::class, 'departmentPhone']);
Route::add(['GET', 'POST'], '/addUserPhone', [Controller\Site::class, 'addUserPhone']);
Route::add(['GET', 'POST'], '/addNewRoom', [Controller\Site::class, 'addNewRoom']);
Route::add(['GET', 'POST'], '/addNewPhone', [Controller\Site::class, 'addNewPhone']);
Route::add(['GET', 'POST'], '/addNewDepartment', [Controller\Site::class, 'addNewDepartment']);
