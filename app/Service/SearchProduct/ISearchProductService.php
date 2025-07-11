<?php 

namespace App\Service\SearchProduct;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

interface ISearchProductService {
    public function GetAllProduct(Request $request);
    public function GetPrice(Request $request);
    public function GetProductByCategory(Request $request);

    public function GetProductByCategoryWithPrice(Request $request);
}