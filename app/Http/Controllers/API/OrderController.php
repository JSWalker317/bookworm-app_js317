<?php

namespace App\Http\Controllers\API;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\OrderRequest;
use App\Http\Controllers\Controller;
use App\Interfaces\OrderRepositoryInterface;

class OrderController extends Controller 
{
    private OrderRepositoryInterface $orderRepository;

    public function __construct(OrderRepositoryInterface $orderRepository) 
    {
        $this->orderRepository = $orderRepository;
    }
// get
    public function index(): JsonResponse 
    {
        return response()->json([
            'data' => $this->orderRepository->getAllOrders()
        ]);
    }
// post
    public function store(Request $request): JsonResponse 
    {
        $orderDetails = $request->all();

        return response()->json(
            [
                'data' => $this->orderRepository->createOrder($orderDetails)
            ],
            Response::HTTP_CREATED
        );
//         $id = 1;
//         $id_item = 0;
//         $data_items = array();
// // 
//         $number = DB::table('order')->max('id');
//         if (!is_null($number)) {$id = $number + 1;}
// // 
//         $max_id = DB::table('order_item')->max('id');
//         if (!is_null($max_id)) {$id_item = $max_id + 1;}
// // 

//         $credentials = request() -> validate([
//             'book' => ['required','array'],
//         ]);
//         $order_amount = 0;
//         foreach ($credentials['book'] as $value) {
//             $data_items[] = [
//                 'id' => $id_item,
//                 'order_id' => $id,
//                 'book_id' => $value['book_id'],
//                 'quantity' => $value['quantity'],
//                 'price' => $value['price']
//             ];
//             $order_amount += ( $value['quantity'] * $value['price'] );
//             $id_item ++;
//         };

//         $order = new Order();
//         $order->id = $id;
//         $order->order_date = now();
//         $order->order_amount = $order_amount;
//         $order->save();


//         $orderItem =  OrderItem::Create($data_items);


//          return response()->json(
//             [
//                 'order' => $order
//             ],
//             Response::HTTP_CREATED
        // );
    }
// get
    public function show(Request $request): JsonResponse 
    {
        $orderId = $request->route('id');

        return response()->json([
            'data' => $this->orderRepository->getOrderById($orderId)
        ]);
    }
// put
    public function update(Request $request): JsonResponse 
    {
        $orderId = $request->route('id');
        $orderDetails = $request->all();

        return response()->json([
            'data' => $this->orderRepository->updateOrder($orderId, $orderDetails)
        ]);
    }
// delete
    public function destroy(Request $request): JsonResponse 
    {
        $orderId = $request->route('id');
        $this->orderRepository->deleteOrder($orderId);

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }

  
}