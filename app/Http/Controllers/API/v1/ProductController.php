<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $products =Product::paginate(10);
        return view('admin.products.index', compact('products'));
    }
    public function store(StoreProductRequest $request)
    {
        $attribute = array_merge($request->validated(), [Auth::user()->'role' == 'admin');
        Product::create($attribute);
        return response()->json([
            'message' => 'post has been saved'
        ], 200);

    }

}
