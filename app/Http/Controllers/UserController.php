<?php
// app/Http/Controllers/UserController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Tampilkan dashboard user.
     */
    public function dashboard()
    {
        return view('user.dashboard');
    }
}
