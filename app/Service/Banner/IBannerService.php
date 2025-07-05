<?php 

namespace App\Service\Banner;

use Illuminate\Http\Request;
interface IBannerService {
    public function GetAllBanner(Request $request);
    public function FormAddBanner();
    public function AddBanner(Request $request);
    public function GetBannerById($id);
    public function UpdateBannerById(Request $request,$id);
    public function DeleteBannerById($id);
}