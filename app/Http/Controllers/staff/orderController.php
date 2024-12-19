<?php
namespace App\Http\Controllers\staff;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class orderController
{

    public function changeStatus(Request $request,$id){
        DB::table('orders')
        ->where('id', $id)
        ->update([
        'status' => $request->input('status')
        ]);
        return back();
    }

    public function getOrderDetail($id){
        $order_details=DB::table('order_details')
        ->join('products', 'order_details.product_id', '=', 'products.id')
        ->join('product_color', 'order_details.color_id', '=', 'product_color.id')
        ->where('order_id', $id)
        ->select('products.nameProduct','products.codeProduct','products.mainImage','products.price','product_color.nameColor','product_color.codeColor','order_details.quantity','order_details.total')
        ->get();
        if(Auth::user()->role_id==2){
            return view("staff.orderdetail",compact('order_details','id'));

        }else if(Auth::user()->role_id==1){
            return view("admin.orderdetail",compact('order_details','id'));

        }
    }

    public function getOrderDetailForClient($id){
        $category_all = DB::table('categories')
                ->where('delCategory', 0)
                ->select('*')
                ->get();
        $order_details=DB::table('order_details')
        ->join('orders', 'order_details.order_id', '=', 'orders.id')
        ->join('products', 'order_details.product_id', '=', 'products.id')
        ->join('product_color', 'order_details.color_id', '=', 'product_color.id')
        ->where('order_id', $id)
        ->select('products.nameProduct','products.codeProduct','products.mainImage','products.price','product_color.nameColor','product_color.codeColor','order_details.quantity','order_details.total')
        ->where('orders.user_id',Auth::user()->id)
        ->get();
       
            return view("member.orderdetail",compact('category_all','order_details','id'));
    }
}
