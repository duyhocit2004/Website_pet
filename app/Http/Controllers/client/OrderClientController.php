<?php

namespace App\Http\Controllers\client;

use App\Models\Location;
use App\Models\CartDetail;
use Illuminate\Http\Request;
use App\Models\PaymentMethod;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrderClientController extends Controller
{
    public function renderOrder(Request $request)
    {
       
        $user = Auth::user();
        
        if(!$user){
            return redirect()->route('formLogin')->with('error',"vui long dang nhap");
        }

        $idListCart = $request->input('cart.id');
        $quantitylistCart = $request->input('quantity');

        $cartItems = CartDetail::whereIn('id', $idListCart) // lấy ra cả id=3 và id=4
        ->WhereHas('cart',function($query) use($user){
            $query->where('user_id',$user->id);
        })
        ->get();

        foreach($cartItems as $id){
            if(isset($quantitylistCart[$id->id])){
                $idCart = CartDetail::find($id->id);
                // dd($id->price );
                $idCart->update([
                    'quantity'=>$quantitylistCart[$id->id],
                    'price'=>$id->price *$quantitylistCart[$id->id]
                ]);
            }
        }


        $getList = CartDetail::whereIn('id',$idListCart)
        ->with('product')
        ->get();

        $GetLocation = Location::where('user_id',$user->id)->get();

        $getMethodPayment = PaymentMethod::get();

        // $getVoucher = 
        //  dd($GetLocation);
        return view('client.Order.Order',compact(['getList','GetLocation','getMethodPayment']));
        
    }
}
