<?php 

namespace App\Service\SearchProduct;

use Illuminate\Http\Request;
use App\Repository\SreachProductRepository ;


class SearchProduct implements ISearchProductService{

    public $SearchProduct;

    public function __construct(SreachProductRepository $SearchProduct ){
            $this->SearchProduct = $SearchProduct;
    }

     public function GetAllProduct(Request $request ){
                return $this->SearchProduct->GetAllProduct($request);
     }
    public function GetPrice(Request $request){
            return $this->SearchProduct->GetPrice($request);
    }
    public function GetProductByCategory(Request $request){
        return $this->SearchProduct->GetProductByCategory($request);
    }

    public function GetProductByCategoryWithPrice(Request $request){
        return $this->SearchProduct->GetProductByCategoryWithPrice($request);
    }
}