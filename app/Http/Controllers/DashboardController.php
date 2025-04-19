<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shops; // Assuming you're loading the 'posts' table

class DashboardController extends Controller
{
    public function index()
    {
        $posts = Shops::all(); // Loads all rows in the 'posts' table

        return view('dashboard', compact('posts'));
    }
}

