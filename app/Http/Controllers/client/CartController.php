<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Service\Cart\ICart;
use App\Service\Cart\Cart;

class CartController extends Controller
{
    public  $CartService;

    public function __construct( Cart $CartService){
        $this->CartService = $CartService;
    }
    public function AddCart(Request $request){
        // dd($request->id);
        return $this->CartService->AddCart($request);
    }
    public function GetCartUser(){
        return $this->CartService->GetCartUser();
    }

    public function DeleteCartUser($id){
        return $this->CartService->DeleteCartUser($id);
    }
    // public function buyNow(Request $request){
    //     return $this->CartService->buyNow($request);
    // }
}
