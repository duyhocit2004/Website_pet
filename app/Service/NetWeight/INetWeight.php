<?php 
  
  namespace App\Service\NetWeight; 
    use Illuminate\Http\Request;
  interface INetWeight {

    public function GetNetWeight(Request $request);
    public function AddNetWeight(Request $request);
    public function GetNetWeightByID($id);
    public function UpdateNetWeightByID(Request $request,$id);
    public function DeleteNetWeight($id);
  }