<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChangeOrderRequest;
use App\Http\Requests\StoreOrderRequest;
use App\Models\Order;
use App\Models\Order_Detail;
use App\Models\User;
use App\Notifications\Orderstatus;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;

class OrderController extends Controller
{
    public function index(Order $order)
    {
        Order::paginate(20);

    }

    public function store(StoreOrderRequest $request)
    {
        $attribute = $request->validated();
        Order::create($attribute);
        Order_Detail::create($attribute);
        return response()->json([
            'message' => 'order has been created'
        ], 201);

    }

    public function changeStatus(ChangeOrderRequest $request, Order $order, Order_Detail $order_detail)
    {
        if ($order->status == waiting) {
            $attribute = $request->validated();
            $order->update($attribute);
            $order_detail::update($attribute);
            return response()->json([
                'message' => 'order has been change'
            ], 200);
        }
        return response()->json([
            'message' => 'order cannot be changed in this status'
        ], 401);
    }
    public function adminchangeStatus(ChangeOrderRequest $request, Order $order, Order_Detail $order_detail,User $user)
    {

            $attribute = $request->validated();
            $order->update($attribute);
            $order_detail::update($attribute);
//            return response()->json([
//                'message' => 'order status has been updated'
//            ], 200);
        Notification::send($user, new Orderstatus::class);
        }
    public function destroy(Order $order,Order_Detail $order_detail)
    {
        if ($order->status == waiting) {
            $order->delete();
            $order_detail->delete();

            return response()->json([
                'message' => 'post has been deleted',
            ], 200);
        }
        return response()->json([
            'message' => 'order cannot be deleted in this status'
        ], 401);
    }
}
