<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Service\Voucher\IVoucher;
use App\Service\Voucher\Voucher;

class VoucherController extends Controller
{
    public IVoucher $VoucherRepository;

    public function __construct(Voucher $VoucherRepository){
        $this->VoucherRepository = $VoucherRepository;
    }

     Public function getAllVoucher(Request $request){
        return $this->VoucherRepository->getAllVoucher($request);
     }
    public function FormAddVoucher(){
        return $this->VoucherRepository->FormAddVoucher();
    }
    public function AddVoucher(Request $request){
        return $this->VoucherRepository->addVoucher($request);
    }
    Public function GetVoucherById($id){
        return $this->VoucherRepository->GetVoucherById($id);
    }
    public function UpdateVoucherById(Request $request , $id){
        return $this->VoucherRepository->UpdateVoucherById($request,$id);
    }
    Public function LockAndUnLockVoucher($id){
        return $this->VoucherRepository->LockAndUnLockVoucher($id);
    }
}
