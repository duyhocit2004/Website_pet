<?php

namespace App\Service\User;
use Illuminate\Http\Request;
use App\Repository\UserRepository;
use App\Common\Notification;
use Illuminate\Auth\Events\Logout;

class UserService implements IUserService{
    public $UserRepository;
    public $notification;
    public function __construct(UserRepository $UserRepository,Notification $notification)
    {
        $this->UserRepository = $UserRepository;
        $this->notification = $notification;
    }

    public function GetPageUser(Request $request) {
        return $this->UserRepository->GetPageUser($request);
    }
    public function GetPageStaff(Request $request){
        return $this->UserRepository->GetPageStaff($request);
    }

    public function LockAcount($id){
        return $this->UserRepository->LockAcount($id);
    }
     public function UnLockAcount($id){
        return $this->UserRepository->UnLockAcount($id);
    }

    public function DetailAcount($id){
         $user = Auth()->user();
        if($user->role === config('contast.Admin') ){
           return $this->UserRepository->DetailAcount($id);
        }else{
            auth()->logout($user);
            return $this->notification->Error('fromLoginAdmin','tài khoản không đúng hoặc không có quyền hạn');
        }

    }
     public function UpdateAccount(Request $request,$id){
            $user = Auth()->user();
        if($user->role === config('contast.Admin') ){
             return $this->UserRepository->UpdateAccount ($request,$id);
        }else{
            auth()->logout($user);
            return $this->notification->Error('fromLoginAdmin','tài khoản không đúng hoặc không có quyền hạn');
        }

     }

     public function accountUser(){
        return $this->UserRepository->accountUser();
     }
     public function UpdateAccountClient($id,Request $request){

        $request->validate([
            'name' => "required|max:50|min:10",
            'phone' => "nullable|numeric|digits :10",
            'email' => "nullable|email",
            'age' => "nullable|numeric|digits_between:1,2"
        ],[
            'name.required' => "Tên bắt buộc phải điền",
            'name.max'=>"tên tối đa là 50 ký tự",
            'name.min'=>"tên phải có là 10 ký tự trở lên",

            'phone.numeric' => "số điện thoại bắt buộc phải là số ",
            'phone.digits  ' => "số điện thoại phải là 10 số" ,

            'email.email' => "định dạng phải là email",

            'age.numeric' => "tuổi phải là số",
            'age.digits_between' => "số tuổi đối ta là 99",

        ]);
//        dd("hello");
        return $this->UserRepository->UpdateAccountClient($id,$request);
     }
    Public function UpdatePassword(Request $request){
        return $this->UserRepository->UpdatePassword($request);
    }

}
