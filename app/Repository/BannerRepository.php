<?php

namespace App\Repository;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Cloudinary\Cloudinary;
use App\Common\Notification;

class BannerRepository
{

    const PATH_VIEW = "admin.Banner.AddBanner";

    public $cloudinary;
    public $notification;
    public function __construct(Cloudinary $cloudinary, notification $notification)
    {
        $this->cloudinary = $cloudinary;
        $this->notification = $notification;
    }

    public function GetAllBanner(Request $request)
    {
        $parper = 5;
        $page = $request->input('page', 1);

        $List = $this->filterBanner($request);
        $count = $List->count();

        $Banner = $List->skip(($page - 1) * $parper)->take($parper)->get();
        $last = ceil($count / $parper);

        return view('admin.banner.listBanner', [
            'Banner' => $Banner,
            'currentPage' => $page,
            'lastPage' => $last,
            'total' => $count,
            'perPage' => $parper,
        ]);
    }
    public function FormAddBanner()
    {
        return View(self::PATH_VIEW);
    }
    public function AddBanner(Request $request)
    {

        $CountBannerActive = Banner::where("status", config('contast.active'))->count();
        if ($CountBannerActive > 3) {
            return $this->notification->Error("GetAllBanner", 'Trạng thái sản phẩm hoạt động được đối đa là 3');
        }


        if ($request->hasFile('Link_video')) {
            $file = $this->cloudinary->uploadApi()->upload($request->file('Link_video')->getRealPath(), [
                'resource_type' => 'video'
            ]);
            $urlFile = $file['secure_url'];
        } else {
            $urlFile = null;
        }

        $tatus = Banner::Create([
            "title" => $request->input('title'),
            "Link_video" => $urlFile,
            "Link_product" => $request->input('Link_product'),
            'descripton' => $request->input('descripton'),
            'status' => $request->input('status'),
            'role' => $request->input('role')
        ]);

        if (!$tatus) {
            return $this->notification->Error('GetAllBanner', 'Thêm không thành công ');
        }
        return $this->notification->Success('GetAllBanner', 'Thêm thành công ');

    }
    public function GetBannerById($id)
    {
        $GetBanner = Banner::findOrFail($id);
        return view('admin.Banner.EditBanner', compact('GetBanner'));
    }
    public function UpdateBannerById(Request $request, $id)
    {

        $id = Banner::findOrFail($id);
        $file = $id->Link_video;
        $CountBannerActive = Banner::where("role", config('contast.active'))->count();
        if ($CountBannerActive > 3) {
            return $this->notification->Error("GetAllBanner", 'Trạng thái sản phẩm hoạt động được đối đa là 3');
        }

        if (!$id) {
            return $this->notification->Error('GetAllBanner', 'Tài khoản không tồn tại ');
        }

        if ($request->hasFile('Link_video')) {
            $file = "";
            if ($id->Link_image) {
                $urlfile = pathinfo($id->Link_image, PATHINFO_FILENAME);
                $this->cloudinary->uploadApi()->destroy($urlfile);
            }
            if ($request->file('Link_video')) {
                $baseFile = $this->cloudinary->uploadApi()->upload($request->files('Link_video')->getRealPath(), [
                    'resource_type' => "video"
                ]);
                $file = $baseFile['secure_url'];
            }

        }

        $id->update([
            'title' => $request->input('title'),
            'descripton' => $request->input('descripton'),
            'Link_video' => $file,
            'Link_product' => $request->input('Link_product'),
            'status' => $request->input('status'),
            'role' => $request->input('role')
        ]);

        return $this->notification->Success("GetAllBanner", 'Sửa sản phẩm thành công');

    }
    public function DeleteBannerById($id)
    {
        $id = Banner::findOrFail($id)->delete();
        if (!$id) {
            return $this->notification->Error('GetAllBanner', 'Sản phẩm không tồn tại');
        }
        return $this->notification->Success('GetAllBanner', 'Xóa thành công');

    }

    static function filterBanner(Request $request)
    {
        $Banner = Banner::query()->orderByDesc('created_at');
        if ($request->input('role') || $request->input('status')) {
            $Banner->where('role', $request->input('role'))
                ->orWhere('status', $request->input('status'));
        }
        return $Banner;
    }
}