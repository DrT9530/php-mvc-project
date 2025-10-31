<?php
namespace App\Controllers;

use App\Core\Controller; // <-- TAMBAHKAN INI

class HomeController extends Controller
{
    public function index() {
        $data = [
            'title' => 'Home Page',
            'message' => 'Selamat datang di MVC Framework'
        ];
        
        $this->view('home.index', $data);
    }
}
