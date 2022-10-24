<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
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
        $orderDetails = $request->only([
            'user_id',
            'order_amount'
        ]);

        return response()->json(
            [
                'data' => $this->orderRepository->createOrder($orderDetails)
            ],
            Response::HTTP_CREATED
        );
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
        $orderDetails = $request->only([
            'client',
            'details'
        ]);

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