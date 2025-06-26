<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\Product\productService;
use App\Service\product\IproductService;

class productController extends Controller
{
        public IproductService $product ;
        public function __construct(productService $product){
                $this->product=$product;
        }
        
        public function GetAllProductPaginate(Request $request){
                return  $this->product->GetAllProductPaginate($request);
                 
        }
        public function FormAddProduct(){
                 return  $this->product->FormAddProduct();
        }
        public function postAddProduct(Request $request){
                
                return $this->product->postAddProduct($request);
        }
        public function GetProductById($id){
                return $this->product->GetProductById($id);
        }
        public function UpdateProductById(Request $request,$id){
                return $this->product->UpdateProductById($id,$request);
        }
        public function DeleteProductById($id){
                return $this->product->DeleteProductById($id);
        }
}
