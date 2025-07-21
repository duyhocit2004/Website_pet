<?php

namespace App\Service\Order;

use Illuminate\Http\Request;


interface IOrderService {
    public function GetAllOrder(Request $request);
    public function GetDetailOrder($id);
    public function UpdateOrder($id,Request $request);
    public function DeleteAdd(Request $request);
    
    

}