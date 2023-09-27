<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $specials = Category::where('name', 'specialite')->first();
        return view('welcome', compact('specials'));
    }

    public function merci()
    {
        return view('merci');
    }
}
