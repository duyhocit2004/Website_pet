<?php

namespace App\Repository;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

use App\Common\Notification;
use Illuminate\Support\Facades\DB;

class SreachProductRepository
{

    public $notification;
    public function __construct(Notification $notification)
    {
        $this->notification = $notification;
    }

    public function GetAllProduct(Request $request)
    {
        $categories = (array) $request->input('selectedCategories', []);
        $sort = $request->input('sort', "define");



        $product = Product::query()
            ->join('product_vartiant', 'product.id', '=', 'product_vartiant.product_id')
            ->select('product.*', DB::raw('Min(product_vartiant.price) as GiaMin'))
            ->groupBy('product.id', 'product.name', 'product.image');

        if ($categories == []) {
            $product->get();
        }

        if ($request->has('selectedCategories')) {
            $product->whereIn('product.category_id', $categories);
        }

        switch ($sort) {
            case 'define':
                $product->orderBy('product.created_at', 'desc');
                break;
            case 'lowtohigh':
                $product->orderBy('GiaMin', 'asc');
                break;
            case 'hightolow':
                $product->orderBy('GiaMin', 'desc');
                break;
            case ' rating':
                $product->orderBy('rating', 'desc');
                break;
            default:
                # code...
                break;
        }


        return $this->notification->SuccesApi($product->paginate(10), 200, "lấy dữ liêu thành công");
    }
    public function GetPrice(Request $request)
    {

    }
    public function GetProductByCategory(Request $request)
    {

    }

    public function GetProductByCategoryWithPrice(Request $request)
    {

    }
}