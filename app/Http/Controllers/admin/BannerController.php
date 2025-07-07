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
        return $this->bannerService->FormAddBanner();
    }
    public function AddBanner(Request $request){
        return $this->bannerService->AddBanner($request);   
    }
    public function GetBannerById($id){
        return $this->bannerService->GetBannerById($id);
    }
    public function UpdateBannerById(Request $request,$id){
        return $this->bannerService->UpdateBannerById($request,$id);
    }
    public function DeleteBannerById($id){
        return $this->bannerService->DeleteBannerById($id);
    }
}
