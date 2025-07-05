<?php 

namespace App\Service\Banner;

use Illuminate\Http\Request;

use App\Repository\BannerRepository;
class BannerService implements IBannerService {

    public $BannerRepository;

    public function __construct(BannerRepository $BannerRepository){
        $this->BannerRepository = $BannerRepository;
    }
     public function GetAllBanner(Request $request){
        return $this->BannerRepository->GetAllBanner($request);
     }
    public function FormAddBanner(){
        return $this->BannerRepository->FormAddBanner();
    }
    public function AddBanner(Request $request){
        return $this->BannerRepository->AddBanner($request);
    }
    public function GetBannerById($id){
        return $this->BannerRepository->GetBannerById($id);
    }
    public function UpdateBannerById(Request $request,$id){
        return $this->BannerRepository->UpdateBannerById($request,$id);
    }
    public function DeleteBannerById($id){
        return $this->BannerRepository->DeleteBannerById($id);
    }
}