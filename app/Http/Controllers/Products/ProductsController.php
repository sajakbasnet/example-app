<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller
{
    //
    public function index(Request $request)
    {
        $search = $request->input('search');
        $products = Products::orderBy('created_at', 'desc')->where('name', 'like', '%$search%')->get();
        $user = Auth::user();
        return view('products.index', compact('products', 'user'));
    }
    public function create()
    {
        $user = Auth::user();
        return view('products.create', compact('user'));
    }
}