<?php

namespace App\Repository;

use App\Models\Voucher;


use App\Common\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class VoucherRepository
{
    public $notification;
    public function __construct(Notification $notification)
    {
        $this->notification = $notification;
    }

    public function getAllVoucher(Request $request)
    {
        $parper = 7;
        $page = $request->input('page', 1);

        $List = $this->filterVoucher($request);
        $count = $List->count();

        $Voucher = $List->skip(($page - 1) * $parper)->take($parper)->get();
        $last = ceil($count / $parper);

        return view("admin.Vouchers.ListVoucher", [
            'Voucher' => $Voucher,
            'currentPage' => $page,
            'lastPage' => $last,
            'total' => $count,
            'perPage' => $parper,
        ]);

    }
    public function AddVoucher(Request $request)
    {

        if (Voucher::Where("code", $request->input('code'))->exists()) {
            return back()->with('error', 'Tên Voucher đã tồn tại');
        }

        $date = Date::now();


        $status = Voucher::create([
            "code" => $request->input("code"),
            'description' => $request->input("description") ?? "",
            'discount_value' => $request->input('discount_value') ?? 0,
            "discount_type" => $request->input("discount_type"),
            "max_discount" => (int) $request->input('max_discount') ?? 0,
            "min_order_amount" => $request->input('min_order_amount') ?? 0,
            "usage_limit" => $request->input('usage_limit'),
            "used_count" => 0,
            "start_date" => $request->input("start_date"),
            "end_date" => $request->input('end_date'),
            "is_active" => $request->input('start_date') > $date->toDateString() ? "lock" : "active"
        ]);

        if (!$status) {
            return back()->with('Thêm voucher không thành công');
        }

        return $this->notification->Success('getAllVoucher', 'Thêm mã giảm giá thành công');
    }
    public function GetVoucherById($id)
    {
        $GetVoucher = Voucher::findOrFail($id);

        if (!$GetVoucher) {
            $this->notification->Error('getAllVoucher', 'Mã giảm giá không tồn  tại');
        }

        return view("admin.Vouchers.editVoucher", compact("GetVoucher"));

    }
    public function UpdateVoucherById(Request $request, $id)
    {
        if (Voucher::Where("code", $request->input('code'))->exists()) {
            return back()->with('error', 'Tên Voucher đã tồn tại');
        }

        $date = Date::now();

        $Voucher = Voucher::findOrFail($id);

        if (!$Voucher) {
            return back()->with('Voucher Không tồn tại');
        }
        $Voucher->update([
            "code" => $request->input("code"),
            'description' => $request->input("description") ?? "",
            'discount_value' => $request->input('discount_value') ?? 0,
            "discount_type" => $request->input("discount_type"),
            "max_discount" => (int) $request->input('max_discount') ?? 0,
            "min_order_amount" => $request->input('min_order_amount') ?? 0,
            "usage_limit" => $request->input('usage_limit'),
            "used_count" => 0,
            "start_date" => $request->input("start_date"),
            "end_date" => $request->input('end_date'),
            "is_active" => $request->input('start_date') > $date->toDateString() ? "lock" : "active"
        ]);

        return $this->notification->Success('getAllVoucher', "Sửa voucher thành công");
    }
    public function LockAndUnLockVoucher($id)
    {
        $Voucher = Voucher::findOrFail($id);

        if (!$Voucher) {
            return back() -> with("error", "Voucher không tồn tại");
        }
        if ($Voucher->usage_limit === 0 && $Voucher->discount_type === config("contast.lock")) {
            return $this->notification->Error("getAllVoucher", "Không thể thay đổi trạng thái khi số lượng voucher đã hết");
        }

        if ($Voucher->is_active == config("contast.lock")) {
            $Voucher->update([
                "is_active" => "active"
            ]);
        } else {
            $Voucher->update([
                "is_active" => "lock"
            ]);
        }

        return $this->notification->Success("getAllVoucher", "Cập nhật trạng thái Voucher thành công");

    }
    function filterVoucher(Request $request)
    {

        $Order = Voucher::query();
        if ($request->filled('status')) {
            $Order->where('payment_status_id', 'LIKE', '%' . $request->input('status'), '%');
        }

        // dd($Order);
        return $Order;
    }
}