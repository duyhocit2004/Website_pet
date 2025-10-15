<?php

namespace App\Http\Controllers\client;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\OrderDetail;

class PaymentController extends Controller
{
    public function createPayment($id)
    {

        $Order = Order::find($id);
        // dd($request);
        $OrderDetail = OrderDetail::find('order_id',$Order->id)->get();

        $sum = 0;

        foreach($OrderDetail as $total){
            $sum += $total->total_price;
        }

        $vnp_TxnRef = $Order->id; //Mã giao dịch thanh toán tham chiếu của merchant
        $vnp_Amount = 300000 ; // Số tiền thanh toán
        $vnp_Locale = 'vn'; //Ngôn ngữ chuyển hướng thanh toán
        //Mã phương thức thanh toán
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR']; //IP Khách hàng thanh toán
        $vnp_HashSecret = env('VNP_HASHSECRET');

        // dd(env('VNP_URL'));

        $vnp_ReturnUrl = route('payment.return');

        $startTime = date("YmdHis");
        $expire = date('YmdHis',strtotime('+15 minutes',strtotime($startTime)));

        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => env('VNP_TMNCODE'),
            "vnp_Amount" => (int)($vnp_Amount * 100),
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => "Thanh toan GD:" . $vnp_TxnRef,
            "vnp_OrderType" => "other",
            "vnp_ReturnUrl" => $vnp_ReturnUrl,
            "vnp_TxnRef" => $vnp_TxnRef,
            "vnp_ExpireDate" => $expire
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }

        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = env('VNP_URL') . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        // header('Location: ' . $vnp_Url);

        return redirect()->away($vnp_Url);
    }
    public function paymentReturn(Request $request)
    {
        if($request->vnp_ResponseCode == "00"){
            $Order = Order::find('id',$request->vnp_TxnRef);
            $Order->update([
                'payment_status_id' =>2
            ]);
             return redirect()->route('accountUser')->with('Thanh toán thành công');
        }else{
             return redirect()->back()->with('Thanh toán không thành công');
        }
    }
}
