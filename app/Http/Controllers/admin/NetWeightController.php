<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\NetWeight\NetWeight;
use App\Service\NetWeight\INetWeight;

class NetWeightController extends Controller
{
    public INetWeight $service;

    public function __construct(NetWeight $service){
        $this->service = $service;
    }

     public function GetNetWeight(Request $request){

        $list = $this->service->GetNetWeight($request);
            $NetWeight = $list['NetWeight'] ;
            $currentPage = $list['currentPage'] ;
            $lastPage = $list['lastPage'] ;
            $total = $list['total'] ;
            $perPage = $list['perPage'] ;


        return view('admin.netWeight.ListNetWeight',compact(['NetWeight','currentPage','lastPage','total','perPage']));
    }
    public function FormNetWeight(){
        return view('admin.netWeight.AddNetWeight');
    }
    public function AddNetWeight(Request $request){
        return $this->service->AddNetWeight($request);
    }
    public function GetNetWeightByID($id){
        return $this->service->GetNetWeightByID($id);
    }
    public function UpdateNetWeightByID(Request $request,$id){
        return $this->service->UpdateNetWeightByID($request,$id);
    }
    public function DeleteNetWeight($id){
        return $this->service->DeleteNetWeight($id);
    }
}
