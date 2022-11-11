<?php

namespace App\Interfaces;

interface OrderRepositoryInterface 
{
    public function getAllOrders();
    public function getOrderById($orderId);
    public function deleteOrder($orderId);
    public function createOrder($userId);
    public function updateOrder($orderId, array $newDetails);
    public function getFulfilledOrders();
}