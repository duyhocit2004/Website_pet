<?php 

namespace App\Repository;

use App\Models\Banner;
use Illuminate\Http\Request;
class BannerRepository {
     public function GetAllBanner(Request $request){
                $parper = 5;
        $page = $request->input('page',1);

        $List =$this->filterBanner($request);
        $count = $List->count();
        
        $Banner =$List->skip(($page - 1) * $parper)->take($parper)->get();
        $last = ceil( $count/$parper);

            return view('admin.User.ListUser', [
            'Banner' => $Banner,
            'currentPage' => $page,
            'lastPage' => $last,
            'total' => $count,
            'perPage' => $parper,
        ]);
     }
    public function FormAddBanner(){
        return view('admin.Banner.AddBanner');
    }
    public function AddBanner(Request $request){
        
    }
    public function GetBannerById($id){

    }
    public function UpdateBannerById(Request $request,$id){

    }
    public function DeleteBannerById($id){

    }
    
        static function filterBanner(Request $request){
        $Banner = Banner::query()->orderByDesc('created_at');
        if($request->input('role')){
            $Banner->where('role',$request->input('role'));
            
        }
        return $Banner;
    }
}