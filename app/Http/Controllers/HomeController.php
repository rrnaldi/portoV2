<?php

namespace App\Http\Controllers;


class HomeController extends Controller
{
    public function index()
    {
        return view('user.home'); // Pastikan nama file Blade sesuai dengan yang ada di folder resources/views
    }
}
