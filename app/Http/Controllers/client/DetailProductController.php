<?php

namespace App\Http\Controllers\client;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductVariant;
use App\Http\Controllers\Controller;

use App\Service\Client\ClientService;

class DetailProductController extends Controller
{
   public $ClientService;

   public function __construct(ClientService $ClientService)
   {
      $this->ClientService = $ClientService;
   }

   public function DetailProduct($id)
   {
      // $productDetail = Product::select(
      //     'product_vartiant.*',
      //     'net_weight.name as namecannang',
      //     'color.name as tenmau',
      //     'category.name as categoryName',
      //     'product.*')
      // ->join('category','product.category_id','=','category.id')
      // ->join('product_vartiant','product.id' , '=','product_vartiant.product_id')
      // ->join('color','product_vartiant.color_id','=','color.id')
      // ->join('net_weight','product_vartiant.net_weight_id','=','net_weight.id')
      // ->Where('product_id',$id)
      // ->get();


      return $this->ClientService->DetailProductClient($id);
   }
}
