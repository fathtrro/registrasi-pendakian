<?php

// app/Http/Controllers/AdminController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Tampilkan dashboard admin.
     */
    public function dashboard()
    {
        return view('admin.dashboard');
    }
}

