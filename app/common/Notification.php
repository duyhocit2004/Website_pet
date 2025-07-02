<?php
namespace App\Common;

class Notification {
    public function Success($route,$title){
        return redirect()->route($route)->with('success',$title);
    }
      public function Error($route,$title){
        return redirect()->route($route)->with('error',$title);
    }
}