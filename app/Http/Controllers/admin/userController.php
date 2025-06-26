<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Service\User\IUserService;
use Illuminate\Http\Request;

class userController extends Controller
{
    public $userService;
    public function __construct(IUserService $userService)
    {
        $this->userService = $userService;

    }
    public function GetPageUser(){
        return view('admin.user.user');
    }
    public function GetUserAndAdmin(){
        return $this->userService->GetUserAndAdmin();
    }

    
}
