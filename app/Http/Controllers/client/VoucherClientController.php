<?php

namespace App\Http\Controllers\client;

use App\Models\Voucher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class VoucherClientController extends Controller
{
    public function checkVoucherUser(Request $request)
    {


        $user = Auth::user();
        $Voucher = Voucher::Where('code', $request->query('Voucher'))->first();
        
        
            // ->whereHas('UsedVoucher', function ($query) use ($user) {
            //     $query->Where('user_id', $user->id)
            //         ->Where('status', 'active');
            // })->first();

        if ($Voucher) {

            $Voucher->UsedVoucher()->where('user_id', $user->id)->where('status', 'active')->get();

            return response()->json([
                'data' => $Voucher,
                'message' => "Lấy voucher thành công",
                'status' => 200

            ], 200);
        } else {
            return response()->json([
                'data' =>"",
                'message' => "lấy Voucher không tồn tại",
                'status' => 503

            ], 503);
        }
    }
}
