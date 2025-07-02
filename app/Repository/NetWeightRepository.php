<?php 

namespace App\Repository;

use App\Common\Notification;
use App\Models\NetWeight;
use Illuminate\Http\Request;

class NetWeightRepository{
    public $notification ;

    public function __construct(Notification $notification){
        $this->notification = $notification;
    }
    public function GetNetWeight(Request $request){

        // lấy danh sách theo trang
        $perPage = 5;
        $List = $request->input('page',1);
        $query = NetWeight::query()->orderByDesc('created_at');

        // tổng sô lượng
        $total = $query->count();

        $NetWeight = $query->skip(($List - 1) * $perPage)->take($perPage)->get();
        $lastpage = ceil($total / $perPage);

        return [
            'NetWeight' => $NetWeight,
            'currentPage' => $List,
            'lastPage' => $lastpage,
            'total' => $total,
            'perPage' => $perPage,
        ];

    }
    public function AddNetWeight(Request $request){
        // dd($request);
        NetWeight::create([
            'name' => $request->name
        ]);
        return $this->notification->Success('GetNetWeight','Thêm thành công');
    }
    public function GetNetWeightByID($id){
         $list = NetWeight::findOrFail($id);
         return view('admin.netWeight.editNetWeight',compact('list'));
    }
    public function UpdateNetWeightByID(Request $request,$id){
    try {
         NetWeight::findOrFail($id)->update([
            'name' => $request->input('name')
        ]);

         return $this->notification->Success('ListNetWeight','cập nhật khối lượng thành công');

    } catch (\Throwable $th) {
        return $this->notification->Error('ListNetWeight',$th->getMessage());
    }
      
    }
    public function DeleteNetWeight($id){
        $GetId = NetWeight::findOrFail($id);
        if($GetId){
            $GetId->delete();
            return $this->notification->Success('admin.netWeight.ListNetWeight','xóa thành công');
        }else{
            return $this->notification->Error('admin.netWeight.ListNetWeight','xóa thất bại hoặc sản phẩm không tồn tại');
        }
    }
}