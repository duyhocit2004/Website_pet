<?php

namespace App\Http\Controllers\client;

use App\Models\Cart;
use App\Models\whishList;
use App\Common\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\CartDetail;
use Illuminate\Support\Facades\Auth;

class WhishListController extends Controller
{

    public $Notification;
    public function __construct(Notification $Notification)
    {
        $this->Notification = $Notification;
    }

    public function updateWhishList($id)
    {
        $idUser = Auth::user();

        if (!$idUser) {
            return $this->Notification->Error('formLogin', 'Vui lòng đăng nhập');
        }

        $find = whishList::query()->where('use_id', $idUser->id)->Where('product_id', $id);
        // dd($find);
        if ($find->exists()) {
            $find->delete();
            return $this->Notification->Success('home', 'Xóa sản phẩm yêu thích thành công');
        } else {
            whishList::create([
                'use_id' => $idUser->id,
                'product_id' => $id
            ]);
            return $this->Notification->Success('home', 'Thêm vào danh sách yêu thích thành công');


        }
    }
    public function GetListWishList(){
        $idUser = Auth::user();

        if (!$idUser) {
            return $this->Notification->Error('formLogin', 'Vui lòng đăng nhập');
        }

        $GetWishList = whishList::query()->select('whishlist.*',
        'product.name',
        'product.image',
        'product.discount',
        'Product.status',
        DB::raw('max(product_vartiant.price) as GiaDoiTa'))
        ->join('product','whishlist.product_id','=','product.id')
        ->join('product_vartiant','product.id','=','product_vartiant.product_id')
        ->groupBy(   
            'whishlist.id',
        'whishlist.product_id',
        'whishlist.use_id',
        'product.name',
        'product.image',
        'product.discount',
        'Product.status')
        ->where('use_id',$idUser->id)
        ->get();
        return view('client.whishList.WishList',compact('GetWishList'));
    }
    public function CountListWishList(){
        $idUser = Auth::user();

        if (!$idUser) {
            return $this->Notification->Error('formLogin', 'Vui lòng đăng nhập');
        }

        $CountWhishList = $idUser ? whishList::where('use_id',$idUser->id)->count() : 0;

        $Cart = Cart::where('user_id', $idUser->id)->first();
        $CountCart = $Cart ? CartDetail::where('cart_id',$Cart->id)->count() : 0;

        return response()->json([
            'data'=>[
                'CountWhishList'=>$CountWhishList,
                'CountCart'=>$CountCart
            ]
            ],200);
    }
}
