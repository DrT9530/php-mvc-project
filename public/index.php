<?php

// 1. Tampilkan semua error
ini_set('display_errors', 1);
error_reporting(E_ALL);

echo "<h1>--- MULAI DEBUGGING SERVER ---</h1>";

// 2. Kita cek manual apakah file Router.php BENAR-BENAR ADA
$routerFile = __DIR__ . '/../App/Core/Router.php';
echo "<h2>Tes 1: Pengecekan file 'App/Core/Router.php'</h2>";
echo "<p>Path yang dicek: <code>" . $routerFile . "</code></p>";
echo "<p>Apakah file ada (file_exists)? ";
var_dump(file_exists($routerFile));
echo "</p>";

echo "<hr>";

// 3. Kita paksa load autoloader Composer
$autoloadFile = __DIR__ . '/../vendor/autoload.php';
if (!file_exists($autoloadFile)) {
    die("<h2>ERROR FATAL: 'vendor/autoload.php' TIDAK DITEMUKAN.</h2><p>Jalankan 'composer install' di server.</p>");
}
require_once $autoloadFile;


// 4. KITA BONGKAR ISI CACHE AUTOLOADER-NYA
// Ini adalah "peta" yang dipakai Composer untuk mencari class
$psr4MapFile = __DIR__ . '/../vendor/composer/autoload_psr4.php';
echo "<h2>Tes 2: Memeriksa Peta Autoloader (isi cache)</h2>";
echo "<p>Membaca file: <code>" . $psr4MapFile . "</code></p>";

if (!file_exists($psr4MapFile)) {
    die("<h2>ERROR FATAL: 'vendor/composer/autoload_psr4.php' TIDAK DITEMUKAN.</h2><p>Cache composer rusak.</p>");
}

$autoloaderMap = require $psr4MapFile;

echo "<pre>";
var_dump($autoloaderMap);
echo "</pre>";

echo "<hr>";


// 5. Kita coba panggil class-nya
echo "<h2>Tes 3: Mencoba memanggil 'new App\Core\Router()'</h2>";
try {
    new App\Core\Router();
    echo "<h3>SUKSES! Class Router berhasil dipanggil.</h3>";
} catch (Error $e) {
    echo "<h3>GAGAL. Error: " . $e->getMessage() . "</h3>";
}

echo "<h1>--- SELESAI DEBUGGING ---</h1>";

// Hentikan eksekusi sisanya
die();