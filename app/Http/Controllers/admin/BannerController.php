<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Service\Banner\IBannerService;
use App\Service\Banner\BannerService;

class BannerController extends Controller
{
    public IBannerService $bannerService;
    
    public function __construct(BannerService $bannerService){
        $this->bannerService = $bannerService;
    }

    public function GetAllBanner(Request $request){
        return $this->bannerService->GetAllBanner($request);
    }
    public function FormAddBanner(){

    }
    public function AddBanner(Request $request){

    }
    public function GetBannerById($id){

    }
    public function UpdateBannerById(Request $request,$id){

    }
    public function DeleteBannerById($id){

    }
}
