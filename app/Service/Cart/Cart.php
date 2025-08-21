<?php
namespace App\Service\Cart;
use App\Repository\CartRepository;
use Illuminate\Http\Request;
class Cart implements ICart {

    public $CartRepository ;

    public function __construct(CartRepository $CartRepository){
        $this->CartRepository = $CartRepository;
    }
    public function AddCart(Request $request){
       return $this->CartRepository->AddCart($request);
    }
    public function GetCartUser(){
        return $this->CartRepository->GetCartUser();
    }
    public function DeleteCartUser($id){
        return $this->CartRepository->DeleteCartUser($id);
    }
}