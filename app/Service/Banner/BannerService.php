<?php

namespace App\Service\Banner;

use Illuminate\Http\Request;

use App\Repository\BannerRepository;
class BannerService implements IBannerService
{

    public $BannerRepository;

    public function __construct(BannerRepository $BannerRepository)
    {
        $this->BannerRepository = $BannerRepository;
    }
    public function GetAllBanner(Request $request)
    {
        return $this->BannerRepository->GetAllBanner($request);
    }
    public function FormAddBanner()
    {
        return $this->BannerRepository->FormAddBanner();
    }
    public function AddBanner(Request $request)
    {

        // dd($request);
        $request->validate([
            'title' => "required|max:50|min:5",
            'descripton' => "required|max:200",
            'Link_video' => 'required|mimes:mp4,mov,ogg|max:5368709120',  // 5GB
            'Link_product' => "required",
        ], [
            'title.required' => "Vui lòng nhập tiêu đề",
            'title.max' => "Tiêu đề tối đa 50 ký tự",
            'title.min' => "Tiêu đề tối thiểu 5 ký tự",
            'descripton.required' => "Vui lòng nhập nội dung",
            'descripton.max' => "Nội dung tối đa 300 ký tự",
            'Link_video.required' => "Vui lòng chọn video",
            'Link_video.mimes' => "Video chỉ hỗ trợ: mp4, mov, ogg",
            'Link_video.max' => "Dung lượng video tối đa 5GB",
            'Link_product.required' => "Vui lòng nhập đường dẫn sản phẩm"
        ]);
        // dd($request);
        return $this->BannerRepository->AddBanner($request);
    }
    public function GetBannerById($id)
    {
        return $this->BannerRepository->GetBannerById($id);
    }
    public function UpdateBannerById(Request $request, $id)
    {
        return $this->BannerRepository->UpdateBannerById($request, $id);
    }
    public function DeleteBannerById($id)
    {
        return $this->BannerRepository->DeleteBannerById($id);
    }
}