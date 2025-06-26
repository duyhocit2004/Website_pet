<?php
namespace App\Common;

class Notification {
    public function Success($route,$title){
        return redirect()->route($route)->with('success',$title);
    }
      public function Error($route,$title){
        return redirect()->route($route)->with('error',$title);
    }
    public function returnView($view,$data = null , $data2=[]){
        return view($view,compact($data,$data2));
    } 
}