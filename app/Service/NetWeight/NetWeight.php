<?php 

namespace App\Service\NetWeight;

use App\Models\NetWeight as netWeight1;
use Illuminate\Http\Request;
use App\Repository\NetWeightRepository;

class NetWeight implements INetWeight{

    public  $NetWeightRepository;

    public function __construct(NetWeightRepository $NetWeightRepository){
        $this->NetWeightRepository = $NetWeightRepository;
    }

    public function GetNetWeight(Request $request){
       return $this->NetWeightRepository->GetNetWeight($request);
    }                 
    public function AddNetWeight(Request $request){
        $request->validate([
            'name' => 'required'
        ],[
            'name.required' => "Vui long nhap khoi luong",
        ]);
        
        $list = netWeight1::query()->get();
        foreach ($list as $values) {
          
           if($values->name === $request->name){
                return redirect()->route('FormNetWeight')->with('error',"Khối lượng này đã tồn tại");
           }
        }
        return $this->NetWeightRepository->AddNetWeight($request);
    }
    public function GetNetWeightByID($id){
        return $this->NetWeightRepository->GetNetWeightByID($id);
    }
    public function UpdateNetWeightByID(Request $request,$id){

         $request->validate([
            'name' => 'required'
        ],[
            'name.required' => "Vui long nhap khoi luong",
        ]);

        $list = netWeight1::query()->get();
        foreach ($list as $values) {
          
           if($values->name === $request->name){
                return redirect()->route('ListNetWeight')->with('error',"Khối lượng này đã tồn tại");
           }
        }

        return $this->NetWeightRepository->UpdateNetWeightByID($request,$id);
    }
    public function DeleteNetWeight($id){
        return $this->NetWeightRepository->DeleteNetWeight($id);
    }
}