<?php

namespace App\Service\product;
use Illuminate\Http\Request;
interface IproductService {

    public function GetAllProductPaginate(Request $request);
    public function FormAddProduct();
    public function postAddProduct(Request $data);
    public function GetProductById($id);
    public function UpdateProductById($id,Request $data);
    public function DeleteProductById($id);

}