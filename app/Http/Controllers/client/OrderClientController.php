<?php

namespace App\Http\Controllers\client;

use App\Models\Order;
use App\Models\Product;
use App\Models\Location;
use App\Models\CartDetail;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use App\Models\PaymentMethod;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderClientController extends Controller
{
    public function renderOrder(Request $request)
    {

        $user = Auth::user();

        if (!$user) {
            return redirect()->route('formLogin')->with('error', "vui long dang nhap");
        }

        $idListCart = $request->input('cart.id');
        $quantitylistCart = $request->input('quantity');

        $cartItems = CartDetail::whereIn('id', $idListCart) // lấy ra cả id=3 và id=4
            ->WhereHas('cart', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })->with('ProductVariant')
            ->get();



        foreach ($cartItems as $id) {
            if (isset($quantitylistCart[$id->id])) {
                $idCart = CartDetail::find($id->id);

                // $value = CartDetail::

                $idCart->update([
                    'quantity' => $quantitylistCart[$id->id],
                    'price' => $id->ProductVariant->price * $quantitylistCart[$id->id]
                ]);
            }
        }


        $getList = CartDetail::whereIn('id', $idListCart)
            ->with('product', 'ProductVariant')
            ->get();

        $GetLocation = Location::where('user_id', $user->id)->get();

        $getMethodPayment = PaymentMethod::get();

        // $getVoucher = 
        //  dd($GetLocation);
        return view('client.Order.Order', compact(['getList', 'GetLocation', 'getMethodPayment']));

    }

    public function AddOrder(Request $request)
    {
        // dd($request->all());

        $user = Auth::user();


        $id = Order::create([
            'user_id' => $user->id,
            'code' => 'ORD' . strtoupper(uniqid()),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'province_code' => $request->input('province_code'),
            'province_name' => $request->input('province_name'),
            'district_code' => $request->input('district_code'),
            'district_name' => $request->input('district_name'),
            'ward_code' => $request->input('ward_code'),
            'ward_name' => $request->input('ward_name'),
            'Location_detail' => $request->input('Location_detail'),
            'note' => $request->input('note'),
            'payment_method_id' => $request->input('getMethodPayment'),
            'status_order_id' => 1,
            'payment_status_id' => 1,
            'discount' => 0,
            'status' => "active"
        ]);
        $variants = $request->input('ProductOrder.variant');


        foreach ($variants as $list) {
            $productID = Product::where('name', $list['product_name'])->first();
            $sum = (int) $list['quantity'] * (float) $list['price'];
            OrderDetail::Create([
                'product_id' => $productID->id,
                'order_id' => $id->id,
                'product_name' => $list['product_name'],
                'quantity' => (int) $list['quantity'],
                'price' => (float) $list['price'],
                'total_price' => $sum,
            ]);
        }

        if ($request->input('getMethodPayment') === 1) {
            return redirect()->route('home')->with('đặt hàng thành công');
        } else {
            return redirect()->route('payment.create', $id);
        }
    }

    public function GetListOrderUser(Request $request)
    {
        $page = $request->query('page',5);
        $user = Auth::user();
        // dd($page);
        if (!$user) {
            return redirect()->route('formLogin')->with('Vui lòng đăng nhập');
        }

        $Order = Order::query()
        ->select('orders.*', DB::raw('SUM(orderdetail.total_price) as total'),'payment_status.name as trangthai')
        ->join('orderdetail','orders.id','=','orderdetail.order_id')
        ->join('payment_status','orders.payment_status_id','=','payment_status.id')
        ->groupBy(
        'orders.id',
            'orders.code',
            'orders.created_at',
            'orders.note',
        )
        ->orderBy('orders.id','desc')
        ->paginate($page);

        return view('client.Order.ListOrderUser',compact('Order'));
        // dd($Order);

    }

    public function GetDetailUser()
    {

    }
}
