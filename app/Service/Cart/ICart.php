<?php 
namespace App\Service\Cart;

use Illuminate\Http\Request;

interface ICart {
    public function AddCart(Request $request);
}