<?php

namespace App\Http\Controllers\client;

use App\Models\Banner;
use App\Models\Category;
use App\Common\Notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class mainController extends Controller
{
    public $notification;

    public function __construct(Notification $notification)
    {
        $this->notification = $notification;
    }

    function getAllproduct()
    {
        $data = Banner::query()->where('status', config('contast.active'))
            ->Where('role', 'primary')->get();
        if (!$data) {
            return $this->notification->ErrorApi($data, 200, 'Láy thành công');
        }
        return $this->notification->SuccesApi($data, 200, 'Láy thành công');
    }
    public function GetListFeaturedProducts()
    {
        $data = Banner::query()->where('status', config('contast.active'))
            ->Where('role', 'primary')->get();
        if (!$data) {
            return $this->notification->ErrorApi($data, 200, 'Láy thành công');
        }
        return $this->notification->SuccesApi($data, 200, 'Láy thành công');
    }
    public function ShopbyCategories()
    {
        $data = Category::query()->get();
        if (!$data) {
            return $this->notification->ErrorApi($data, 200, 'Láy thành công');
        }
        return $this->notification->SuccesApi($data, 200, 'Láy thành công');
    }
    public function Bannersecondary()
    {
        $data = Banner::query()->where('status', config('contast.active'))
            ->Where('role', 'secondary')->get();
        if (!$data) {
            return $this->notification->ErrorApi($data, 200, 'Láy thành công');
        }
        return $this->notification->SuccesApi($data, 200, 'Láy thành công');
    }



}
