<?php

// 1. Tampilkan semua error untuk debugging
ini_set('display_errors', 1);
error_reporting(E_ALL);

// 2. INI ADALAH SATU-SATUNYA LOADER YANG ANDA BUTUHKAN
// Ini akan memuat file vendor/autoload.php yang dibuat oleh Composer
require_once __DIR__ . '/../vendor/autoload.php';

// 3. Gunakan 'use' statement untuk memanggil class dari namespace-nya
use App\Core\Router;

// 4. Inisialisasi Router
$router = new Router();

// Define Routes
$router->get('/', 'HomeController@index');
$router->get('/users', 'UserController@index');
$router->get('/users/{id}', 'UserController@show');
$router->post('/users', 'UserController@store');

// Resolve request
$router->resolve();