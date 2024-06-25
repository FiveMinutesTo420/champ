<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function __invoke()
    {
        $sixLastItems = Product::orderBy('id')->limit(6)->get();
        return view('home', ['items' => $sixLastItems]);
    }
    public function about()
    {
        $sixLastItems = Product::orderByDesc('id')->limit(6)->get();
        return view('about', ['items' => $sixLastItems]);
    }
    public function find()
    {
        return view('find');
    }
}
