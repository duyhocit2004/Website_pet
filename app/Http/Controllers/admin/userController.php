<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Service\User\UserService;
use App\Service\User\IUserService;
use App\Http\Controllers\Controller;

class userController extends Controller
{
    public IUserService $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;

    }
    public function GetPageUser(Request $request)
    {
        return $this->userService->GetPageUser($request);
    }
    public function GetPageStaff(Request $request)
    {
        return $this->userService->GetPageStaff($request);
    }

    public function LockAcount($id)
    {
        return $this->userService->LockAcount($id);
    }
    public function UnLockAcount($id)
    {
        return $this->userService->UnLockAcount($id);
    }
    public function DetailAcount($id)
    {
        return $this->userService->DetailAcount($id);
    }

    public function UpdateAccount(Request $request, $id)
    {
        return $this->userService->UpdateAccount($request, $id);
    }





}
