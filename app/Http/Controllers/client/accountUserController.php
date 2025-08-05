<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Service\User\UserService;
use Illuminate\Http\Request;

class accountUserController extends Controller
{
    public $UserService;
    public function __construct(UserService $UserService){
        $this->UserService = $UserService;
    }

    // public function

    public function accountUser(){
        return $this->UserService->accountUser();
    }
    public function UpdateAccountClient($id,Request $request){

        return $this->UserService->UpdateAccountClient($id,$request);
    }

    public function formPassword(){
        return view('client.Account.editPassword');
    }
    Public function UpdatePassword(Request $request){
        return $this->UserService->UpdatePassword($request);
    }
    public function getLocationUser (){
        return $this->UserService->getLocationUser();
    }

    public function AddLocation (Request $request){
        return $this->UserService->AddLocation($request);
    }
    public function GetLocationById ($id){
        return $this->UserService->GetLocationById($id);
    }
    public function updateLocation (Request $request,$id){
        return $this->UserService->updateLocation($request,$id);
    }
    public function deleteLocation ($id){
            return $this->UserService->deleteLocation($id);
    }

}

