<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Service\Order\IOrderService;
use App\Service\Order\OrderService;

class OrderController extends Controller
{
    public IOrderService $OrderService ;

    public function __construct( OrderService $OrderService){
        $this->OrderService = $OrderService;
    }
    
     public function GetAllOrder(Request $request){
        return $this->OrderService->GetAllOrder($request);
     }
    public function GetDetailOrder($id){
        return $this->OrderService->GetDetailOrder($id);
    }
    public function UpdateOrder($id,Request $request){
        return $this->OrderService->UpdateOrder($id,$request);
    }
    public function DeleteAdd(Request $request){
        return $this->OrderService->DeleteAdd($request);
    }
   
}
