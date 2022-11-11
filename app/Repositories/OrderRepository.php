<?php

namespace App\Repositories;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Interfaces\OrderRepositoryInterface;

use function PHPUnit\Framework\isNull;

class OrderRepository implements OrderRepositoryInterface 
{
    public function getAllOrders() 
    {
        return Order::all();
    }

    public function getOrderById($orderId) 
    {
        return Order::findOrFail($orderId)->get('order_amount');
    }

    public function deleteOrder($orderId) 
    {
        Order::destroy($orderId);
    }

    public function createOrder($userId) 
    {
        // return Order::create($orderDetails);
        $id = 0;
        $id_item = 0;
        $data_items = array();
// 
        $number = DB::table('order')->max('id') == null ? 0:
        (int)DB::table('order')->max('id');
        $id = $number + 1;
// 
        $max_id = DB::table('order_item')->max('id') == null ? 0:
        (int)DB::table('order_item')->max('id');
        $id_item = $max_id + 1;
// 

        $credentials = request() -> validate([
            'book' => ['required','array'],
        ]);
        $order_amount = 0;
        foreach ($credentials['book'] as $value) {
            $data_items[] = [
                'id' => $id_item,
                'order_id' => $id,
                'book_id' => $value['book_id'],
                'quantity' => $value['quantity'],
                'price' => $value['price']
            ];
            $order_amount += ( $value['quantity'] * $value['price'] );

          

        };

        $order = new Order();
        $order->id = $id;
        $order->user_id = $userId;
        $order->order_date = now();
        $order->order_amount = $order_amount;
        $order->save();

        foreach ($credentials['book'] as $value) {
            $orderItem = new OrderItem();
            $orderItem->id = $id_item;
            $orderItem->order_id = $id;
            $orderItem->book_id = $value['book_id'];
            $orderItem->quantity = $value['quantity'];
            $orderItem->price = $value['price'];
            $orderItem->save();
            $id_item ++;

        }
      

         return response()->json(
            [
                'order' => $order,
                'orderItems' => OrderItem::select('order_item.*')->whereBetween('id',array($max_id+1,$id_item))->get()
            ],
            Response::HTTP_CREATED
        );
    }

    public function updateOrder($orderId, array $newDetails) 
    {
        return Order::whereId($orderId)->update($newDetails);
    }

    public function getFulfilledOrders() 
    {
        return Order::where('is_fulfilled', true);
    }
}