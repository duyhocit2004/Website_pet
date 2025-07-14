<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\ProductVariant;
use App\Http\Controllers\Controller;

use App\Common\Notification;

class AllVariantController extends Controller
{

    public $notification;

    public function __construct(Notification $notification)
    {
        $this->notification = $notification;
    }

    public function GetAllVariantProduct($id)
    {
        $variant = ProductVariant::query()->where('product_id',$id)->get();
        if (!$variant) {
            $this->notification->ErrorApi($variant, 400, "không tồn tại");
        }

        return $this->notification->SuccesApi($variant, 200, "Lấy thành công");

    }
}
