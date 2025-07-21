<?php

namespace App\Service\Order;

use Illuminate\Http\Request;
use App\Repository\OrderRepository;

class OrderService implements IOrderService
{
    public $OrderRepository;
    public function __construct(OrderRepository $OrderRepository)
    {
        $this->OrderRepository = $OrderRepository;
    }
    public function GetAllOrder(Request $request)
    {

        return $this->OrderRepository->GetAllOrder($request);
    }
    public function GetDetailOrder($id)
    {
        return $this->OrderRepository->GetDetailOrder($id);

    }
    public function UpdateOrder($id, Request $request)
    {
        return $this->OrderRepository->UpdateOrder($id,$request);
    }
    public function DeleteAdd(Request $request)
    {

    }
}