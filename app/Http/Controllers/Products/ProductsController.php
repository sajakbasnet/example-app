<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateProductRequest;

class ProductsController extends Controller
{
    //
    public function index(Request $request)
    {
        $search = $request->input('search');
        if ($search) {
            $products = Products::orderBy('created_at', 'desc')->where('name', 'like', '%$search%')->get();
        } else {
            $products = Products::orderBy('created_at', 'desc')->get();
        }
        $user = Auth::user();
        return view('products.index', compact('products', 'user'));
    }
    public function create()
    {
        $user = Auth::user();
        return view('products.create', compact('user'));
    }
    public function store(CreateProductRequest $request)
    {
        $data = $request->validated();
        $data = [
            'name' => $data['name'],
            'description' => $data['description'],
            'price' => $data['money'],
            'category' => $data['category'],
            'brand' => $data['brand'],
            'size' => $data['size'],
            'color' => $data['color'],
            'material' => $data['material'],
            'status' => $data['status'],
        ];
        $product = Products::create($data);
        return redirect()->route('products.index')->with('success', 'Product created successfully');
    }
    public function show($id)
    {
        $product = Products::find($id);
        $user = Auth::user();
        return view('products.show', compact('product', 'user'));
    }
    public function edit($id)
    {
        $product = Products::find($id);
        $user = Auth::user();
        return view('products.edit', compact('product', 'user'));
    }
    public function update(Request $request, $id)
    {
        $product = Products::find($id);
        $product->update($request->all());
        return redirect()->route('products.index')->with('success', 'Product updated successfully');
    }
    public function destroy($id)
    {
        $product = Products::find($id);
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully');
    }
}
