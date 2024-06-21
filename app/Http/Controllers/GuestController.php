<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Models\Product;

class GuestController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('guest.index', compact('products'));
    }
}
