<?php

namespace App\Repository;
use App\Models\Cart;
use App\Models\User;
use App\Models\Product;
use App\Models\CartDetail;
use Illuminate\Http\Request;
use App\Models\ProductVariant;
use Illuminate\Support\Facades\Auth;
use App\Common\Notification;

class CartRepository
{
    public $notification;
    public function __construct(Notification $notification)
    {
        $this->notification = $notification;
    }

    public function GetCartUser(){
        $user = Auth::user();

        if(!$user){
            return $this->notification->Error('formLogin','Vui lòng đăng nhập');
        }

        $product = CartDetail::whereHas('cart',function ($query) use ($user){
            $query->where('user_id',$user->id);
        })
        ->with('ProductVariant','Product')
        ->get();
        
        return view('client.cart.cart',compact('product'));
    }

    public function AddCart(Request $request)
    {
        $User = Auth::user();

        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Bạn cần đăng nhập');
        }



        $CartUser = Cart::where('user_id', $User->id)->first();

        if (!$CartUser) {
            $CartUser = Cart::create([
                'user_id' => $User->id,
                "status" => config("contast.active")
            ]);
        }
        $product = Product::findOrFail($request->id);
        if (!$product) {
            return redirect()->route('home')->with('error', "Sản phẩm không còn tồn tại");
        }


        if ($CartUser) {

            $idProductVariant = ProductVariant::query()->where("color_id", $request->color)
                ->Where("net_weight_id", $request->weight)
                ->value('id');

            $search = CartDetail::Where("cart_id", $CartUser->id)
                ->where("product_id", $request->id)
                ->where('product_vartiant_id', $idProductVariant)
                ->first();

            if (!$search) {

                $true = CartDetail::create([
                    "cart_id" => $CartUser->id,
                    "product_id" => $request->id,
                    "product_vartiant_id" => $idProductVariant,
                    "quantity" => $request->quantity,
                    "price" => $request->quantity * $request->price,
                ]);
                return redirect()->route('DetailProduct', $request->id)->with('success', "Cập nhật giỏ hàng thành công");

            } else {
                $search->update([
                    "quantity" => $search->quantity + $request->quantity,
                    "price" => $request->price * ($search->quantity + $request->quantity)
                ]);
                return redirect()->route('DetailProduct', $request->id)->with('success', "Cập nhật giỏ hàng thành công");
            }


        }

        return redirect()->route('DetailProduct', $request->id)->with('success', "Cập nhật giỏ hàng thành công");
    }
    public function DeleteCartUser($id){
        
    }
}