<?php 

namespace App\Service\Voucher;

use Illuminate\Http\Request;

interface IVoucher {
    Public function getAllVoucher(Request $request);
    public function FormAddVoucher();
    public function AddVoucher(Request $request);
    Public function GetVoucherById($id);
    public function UpdateVoucherById(Request $request , $id);
    Public function LockAndUnLockVoucher($id);
}