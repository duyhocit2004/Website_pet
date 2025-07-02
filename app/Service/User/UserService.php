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
}