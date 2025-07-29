<?php

namespace App\Service\Voucher;

use Illuminate\Http\Request;
use App\Repository\VoucherRepository;
class Voucher implements IVoucher {
   public $VoucherRepository;
   public function __construct(VoucherRepository $VoucherRepository){
      $this->VoucherRepository = $VoucherRepository;
   }
     Public function getAllVoucher(Request $request){
        return $this->VoucherRepository->getAllVoucher($request);
     }
    public function FormAddVoucher(){
        return view('admin.Vouchers.addVoucher');
    }
    public function AddVoucher(Request $request){
        // dd($request->all());
        $request->validate([
            'code' => 'required|regex:/^[A-Za-z0-9]+$/|max:100',
            "usage_limit" => 'required|numeric',
            "min_order_amount" => 'required|numeric',
            'max_discount' => 'required|numeric',
            'discount_type'=>"required|in:precent,amount",
            'discount_value' => 'required|numeric',
            'start_date'=>'required|date|before:end_date',
            'end_date'=>"required|date|after:start_date",
            'description' => "required|max:100"

        ],[
            'code.required' => "vui lòng nhập tên mã giảm giá",
            'code.regex' => "tên voucher chỉ chứa số và chữ",
            'code.max' => "kỹ tự đối là 100",
            "usage_limit.required"=>"vui long nhap số lượng mã",
            'usage_limit.numeric' => "chỉ được nhập số",
            "min_order_amount.required" =>"vui lòng nập góa trị tối thiểu của voucher",
            'min_order_amount.numeric'=>"giá trị của voucher phải là số",
            "max_discount.required"=> " vui lòng nhập giá trị đối ta",
            "max_discount.numeric"=>"giá trị đối ta phải là số",
            "discount_type.required" => "vui lòng nhập loại giá trị cho voucher",
            "discount_type.in"=>"vui long nhập voucher theo giá tiền hoặc phần trăm",
            "discount_value.required"=>"vui long nhập giá tiền giảm cho voucher",
            "discount_value.numeric"=>"giá tiền giảm của voucher phải là số",
            'start_date.required'=>"vui lòng chọn này",
            'start_date.before' => " ngày bắt đầu phải lớn hơn ngày kết thúc",
            'start_date.date' => "bắt buộc phải là ngày",
            "end_date.required" => "vui lòng chọn ngày kết thúc",
            "end_date.date" => 'bắt buộc phải là ngày tháng năm',
            "end_date.after"=>"ngày kết thúc phải sau ngày bắt đầu",
            'description.required' => "vui lòng nhập nội dung",
            "description.max" => "tối đa tiêu đề là 100 ký tự"
        ]);

        if($request->input('start_date') > $request->input('end_date')){
            return back()->with("error","ngày bắt đầu không được lớn hơn ngày kết thúc");
        }
        if($request->input('discount_type') === "precent" && $request->input('discount_value') > 50 ){
            return back()->with('error',"Giá trị giảm theo phần trăn không được lớn hơn 50%");
        }
         if($request->input('discount_type') === "amount" && $request->input('discount_value') > 10000000 ){
            return back()->with('error',"Giá trị giảm không được lớn hơn 10trieu ");
        }


        return $this->VoucherRepository->AddVoucher($request);
    }
    Public function GetVoucherById($id){
       return $this->VoucherRepository->GetVoucherById($id);
    }
    public function UpdateVoucherById(Request $request , $id){
         $request->validate([
            'code' => 'required|regex:/^[A-Za-z0-9]+$/|max:100',
            "usage_limit" => 'required|numeric',
            "min_order_amount" => 'required|numeric',
            'max_discount' => 'required|numeric',
            'discount_type'=>"required|in:precent,amount",
            'discount_value' => 'required|numeric',
            'start_date'=>'required|date|before:end_date',
            'end_date'=>"required|date|after:start_date",
            'description' => "required|max:100"

        ],[
            'code.required' => "vui lòng nhập tên mã giảm giá",
            'code.regex' => "tên voucher chỉ chứa số và chữ",
            'code.max' => "kỹ tự đối là 100",
            "usage_limit.required"=>"vui long nhap số lượng mã",
            'usage_limit.numeric' => "chỉ được nhập số",
            "min_order_amount.required" =>"vui lòng nập góa trị tối thiểu của voucher",
            'min_order_amount.numeric'=>"giá trị của voucher phải là số",
            "max_discount.required"=> " vui lòng nhập giá trị đối ta",
            "max_discount.numeric"=>"giá trị đối ta phải là số",
            "discount_type.required" => "vui lòng nhập loại giá trị cho voucher",
            "discount_type.in"=>"vui long nhập voucher theo giá tiền hoặc phần trăm",
            "discount_value.required"=>"vui long nhập giá tiền giảm cho voucher",
            "discount_value.numeric"=>"giá tiền giảm của voucher phải là số",
            'start_date.required'=>"vui lòng chọn này",
            'start_date.before' => " ngày bắt đầu phải lớn hơn ngày kết thúc",
            'start_date.date' => "bắt buộc phải là ngày",
            "end_date.required" => "vui lòng chọn ngày kết thúc",
            "end_date.date" => 'bắt buộc phải là ngày tháng năm',
            "end_date.after"=>"ngày kết thúc phải sau ngày bắt đầu",
            'description.required' => "vui lòng nhập nội dung",
            "description.max" => "tối đa tiêu đề là 100 ký tự"
        ]);

        if($request->input('start_date') > $request->input('end_date')){
            return back()->with("error","ngày bắt đầu không được lớn hơn ngày kết thúc");
        }
        if($request->input('discount_type') === "precent" && $request->input('discount_value') > 50 ){
            return back()->with('error',"Giá trị giảm theo phần trăn không được lớn hơn 50%");
        }
         if($request->input('discount_type') === "amount" && $request->input('discount_value') > 10000000 ){
            return back()->with('error',"Giá trị giảm không được lớn hơn 10trieu ");
        }
        return $this->VoucherRepository->UpdateVoucherById($request,$id);
    }
    Public function LockAndUnLockVoucher($id){
        return $this->VoucherRepository->LockAndUnLockVoucher($id);
    }
}