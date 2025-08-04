<?php

namespace App\Http\Controllers\admin;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class DoashboardController extends Controller
{

    public $notification;

    public $start_day;
    public $end_day;

    public function __construct()
    {
        $this->start_day = Carbon::now()->startOfDay();
        $this->end_day = Carbon::now()->endOfDay();

    }
    public function TotalOrderForDay()
    {


    }
    public function TotalOrdersPendingConfirmation()
    {
        $count = Order::Where("status_order_id", 1)
        ->count();

        return response()->json([
            "data" => $count,
            "status" => 200
        ]);
    }
    public function TotalConfirmedOrders()
    {
        $count = Order::Where("status_order_id", 2)
        ->count();

        return response()->json([
            "data" => $count,
            "status" => 200
        ]);
    }
    public function TotalOrdersInTransit()
    {
        $count = Order::Where("status_order_id", 3)
        ->count();

        return response()->json([
            "data" => $count,
            "status" => 200
        ]);
    }
    public function TotalCancelledOrders()
    {
        $count = Order::Where("status_order_id", 5)
        ->count();

        return response()->json([
            "data" => $count,
            "status" => 200
        ]);
    }

    public function getRealTimeRevenue(){
        $start = Carbon::today()->startOfDay();
        $end = Carbon::now();

        $result = Order::selectRaw("DATE_FORMAT(orders.created_at,'%H:%i') as time ,SUM(orderdetail.total_price) as total")
        ->join('orderdetail',"orderdetail.order_id","=","orders.id")
        ->where("orders.status_order_id",4)
        ->whereBetween("orders.created_at",[$start,$end])
        ->groupBy('time')
        ->orderBy("time")
        ->pluck("total",'time')
        ->toArray();

        $minutes = [];
        $copydate = $start->copy();
        while($copydate <= $end){
            $key = $copydate->format("H:i");
            $minutes[]=[
                'time' => $key,
                "total" => isset($result[$key]) ? $result[$key] : 0
            ];
            $copydate->addMinute();
        }
         return response()->json( $minutes);
    }

    public function CountActiveUsers(){
        $CountUser = User::Where("status",config('contast.active'))
        ->where('role','=',config('contast.User'))
        ->count();

        return response()->json( $CountUser);
    }
    public function CountOrderInOneDay(){
         $count = Order::Where("status_order_id", 4)
        ->count();
        return response()->json( $count);
    }
}
