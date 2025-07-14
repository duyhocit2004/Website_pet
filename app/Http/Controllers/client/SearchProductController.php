<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Service\SearchProduct\ISearchProductService;
use App\Service\SearchProduct\SearchProduct;
use Illuminate\Http\Request;

class SearchProductController extends Controller
{

    public ISearchProductService $SearchProduct;

    public function __construct(SearchProduct $SearchProduct)
    {
        $this->SearchProduct = $SearchProduct;

    }

    public function pageSreach()
    {
        return view('client.SreachProduct.sreachproduct');
    }

    public function GetAllProduct(Request $request)
    {
        return $this->SearchProduct->GetAllProduct($request);
    }
    public function GetPrice(Request $request)
    {
        return $this->SearchProduct->GetPrice($request);
    }
    public function GetProductByCategory(Request $request)
    {
        return $this->SearchProduct->GetProductByCategory($request);
    }

    public function GetProductByCategoryWithPrice(Request $request)
    {
        return $this->SearchProduct->GetProductByCategoryWithPrice($request);
    }
}
