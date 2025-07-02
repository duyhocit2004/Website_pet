<?php 

namespace App\Service\User;
use App\Repository\UserRepository;
use Illuminate\Http\Request;


interface IUserService
{
    public function GetPageUser(Request $request) ;
    public function GetPageStaff(Request $request);

    public function LockAcount($id);
    public function UnLockAcount($id);
    public function DetailAcount($id);

    public function UpdateAccount(Request $request,$id);

    
    

}