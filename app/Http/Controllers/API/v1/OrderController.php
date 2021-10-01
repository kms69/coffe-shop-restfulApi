<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderRequest;
use App\Models\Order;
use App\Models\Order_Detail;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
         Order::paginate(20);

    }
    public function store(StoreOrderRequest $request)
    {
         $attribute=$request->validated();
        Order::create($attribute);
        Order_Detail::create($attribute);
        return response()->json([
            'message' => 'order has been created'
        ], 201);

    }
}
