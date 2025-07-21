<?php

namespace App\Repository;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\StatusOrder;
use App\Common\Notification;
use App\Models\PaymenStatus;
use Illuminate\Http\Request;
use App\Models\HistoryOrderStatus;
use Illuminate\Support\Facades\DB;
use App\Models\HistoryPaymentStatus;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Input\Input;

class OrderRepository
{
    public $notification;

    public function __construct(Notification $notification)
    {
        $this->notification = $notification;
    }

    public function GetAllOrder(Request $request)
    {
        $parper = 5;
        $page = $request->input('page', 1);

        $List = $this->filterOrder($request)
            ->select('orders.*', DB::raw('SUM(orderdetail.price) as TongTien'))
            ->join('orderdetail', 'orderdetail.order_id', '=', 'orders.id')
            ->with(['PaymentMethod', 'PaymenStatus', 'HistoryOrderStatus', 'HistoryPaymentStatus'])
            ->groupBy('orders.id')
            ->orderByDesc('orders.created_at');
        $count = $List->count();
        // dd($List);
        $Order = $List->skip(($page - 1) * $parper)->take($parper)->get();
        $last = ceil($count / $parper);

        return view('admin.Order.ListOrder', [
            'Order' => $Order,
            'currentPage' => $page,
            'lastPage' => $last,
            'total' => $count,
            'perPage' => $parper,
        ]);
    }
    public function GetDetailOrder($id)
    {
        $detailOrder = Order::query()->Where('id', $id)->first();

        if (!$detailOrder) {
            $this->notification->Error('GetAllOrder', 'Sản phẩm không tồn tại');
        }

        $DetailProductOrder = OrderDetail::with('product')
            ->Where('order_id', $id)->get();

        $Payment_status_histories = HistoryPaymentStatus::Where('Order_id', $id)->get();
        $Status_Order_histories = HistoryOrderStatus::where('Order_id', $id)->get();

        $PaymentStatus = PaymenStatus::query()->get();
        $statusOrder = StatusOrder::query()->get();

        //         dd($detailOrder,
// $DetailProductOrder,
// $PaymentStatus,
// $statusOrder,);

        return view('admin.Order.EditOrder', compact(
            'detailOrder',
            'DetailProductOrder',
            'PaymentStatus',
            'statusOrder',
            'Payment_status_histories',
            'Status_Order_histories'
        ));

    }
    public function UpdateOrder($id, Request $request)
    {
        try {
            
            $OrderOld = Order::findOrFail($id);
            $order_status_old = StatusOrder::where('id',$OrderOld->status_order_id)->value('name');
            $status_old = PaymenStatus::Where('id',$OrderOld->payment_status_id)->value('name');

           

            $user = Auth::user();

            $statusNew = StatusOrder::where('id', $request->input('status_order_id'))->value('name');
            $PaymenStatusNew = PaymenStatus::where('id', $request->input('payment_status_id'))->value('name');
            
        
            $OrderOld->update([
                'status_order_id' => $request->input('status_order_id'),
                'payment_status_id' => $request->input('payment_status_id')
            ]);
               
           

            
            if ($OrderOld->payment_method_id == 1 && $OrderOld->status_order_id == 4 && $OrderOld->payment_status_id == 1 ) {
                $OrderOld->update([ 
                    'payment_status_id' => 2
                ]);
                 
               HistoryPaymentStatus::create([
                    'Order_id' => $id,
                    'status_old' => $status_old,
                    'status_new' => "Đã thanh toán",
                    "User_edit_status" => $user->name,
                    "note" => $request->input('note',''),
                ]);
            }
             
            if ($OrderOld->status_order_id !== $request->input('status_order_id')) {
                HistoryOrderStatus::create([
                    "Order_id" => $id,
                    "order_status_old" => $order_status_old,
                    'order_status_new' => $statusNew,
                    "User_edit_method" => $user->name,
                    "note" => $request->input('note') ?? "",
                ]);
            }
              
            if ($OrderOld->payment_status_id !== $request->input('payment_status_id')) {
                HistoryPaymentStatus::create([
                    'Order_id' => $id,
                    'status_old' => $status_old,
                    'status_new' => $PaymenStatusNew,
                    "User_edit_status" => $user->name,
                    "note" => $request->input('note') ?? "",
                ]);
            }
           
            return $this->notification->Success('GetAllOrder', "Cập nhật đơn hàng thành công");
        } catch (\Throwable $th) {
            return redirect()->route('GetDetailOrder',$id)->with('Error', $th->getMessage());
        }
    }
    public function GetFormAdd(Request $request)
    {

    }

    function filterOrder(Request $request)
    {
        $Order = Order::query();
        if ($request->filled('username')) {
            $Order->where('username', 'LIKE', '%' . $request->input('name'), '%');
        }
        if ($request->filled('status')) {
            $Order->where('payment_status_id', 'LIKE', '%' . $request->input('status'), '%');
        }
        if ($request->filled('method')) {
            $Order->where('payment_method_id', 'LIKE', '%' . $request->input('method'), '%');
        }
        // dd($Order);
        return $Order;
    }
}