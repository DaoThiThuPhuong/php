<?php
namespace App\Http\Controllers\staff;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class homestaffController
{
    
    public function index()
    {
        return view("staff.index");
    }
    
    public function user()
    {
        $user_all = DB::table('users')
                ->where('role_id', 3)
                ->select('*')
                ->get();
                if(Auth::user()->role_id==2){
                    return view("staff.user",compact('user_all'));

                }else if(Auth::user()->role_id==1){
        return view("admin.user",compact('user_all'));
                }
    }
    public function staff()
    {
        $user_all = DB::table('users')
                ->where('role_id', 2)
                ->select('*')
                ->get();
        return view("admin.staff",compact('user_all'));
    }

    public function order()
    {
        $status_order = DB::table('status_order')
                ->select('*')
                ->get();

                $orders = DB::table('orders')
                ->join('users', 'orders.user_id', '=', 'users.id')
                ->join('method', 'orders.methodPay', '=', 'method.id')
                ->join('vouchers', 'orders.voucherId', '=', 'vouchers.id')
                ->join('status_order', 'orders.status', '=', 'status_order.id')
                ->select('orders.id','orders.dateOrder','orders.totalOrder','orders.status','users.name','method.nameMethod','status_order.nameStatus','vouchers.nameVoucher','vouchers.discount')
                ->get();
                if(Auth::user()->role_id==2){
                    return view("staff.order",compact('status_order','orders'));
                }else if(Auth::user()->role_id==1){
        return view("admin.order",compact('status_order','orders'));
                    
                }
    }

    
    
}
