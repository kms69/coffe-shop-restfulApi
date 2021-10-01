<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Http\Middleware\IsAdmin;
use App\Http\Requests\StoreProductRequest;
use App\Models\Attribute;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        Product::paginate(10);

    }

    public function store(StoreProductRequest $request)
    {
        $attribute = array_merge([$request->validated()][attributes()->sync($request->attributes)]);
        Product::create($attribute);
        return response()->json([
            'message' => 'post has been saved'
        ], 200);

    }

    public function update(StoreProductRequest $request)
    {
        $attribute = array_merge([$request->validated()][attributes()->sync($request->attributes, false)]);
        Product::update($attribute);
        return response()->json([
            'message' => 'product has been updated'
        ], 201);

    }

    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json([
            'message' => 'product has been deleted'
        ], 200);
    }

}
