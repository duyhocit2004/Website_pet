<?php
namespace App\Common;

use GuzzleHttp\Psr7\Response;

class Notification {
    public function Success($route,$title){
        return redirect()->route($route)->with('success',$title);
    }
      public function Error($route,$title){
        return redirect()->route($route)->with('error',$title);
    }
    public function SuccesApi($data,$status,$message){
        return Response()->json([
            "Data" => $data,
            "Status" => $status,
            "Message" =>$message
        ],200);

    }
    public function ErrorApi($data,$status,$message){
        return Response()->json([
            "Data" => $data,
            "Status" => $status,
            "Message" =>$message
        ],400);

    }
}