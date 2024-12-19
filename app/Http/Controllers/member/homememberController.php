<?php
namespace App\Http\Controllers\member;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class homememberController
{
    public $category_all;

    public function __construct() {
            $this->category_all = DB::table('categories')
                ->where('delCategory', 0)
                ->select('*')
                ->get();

       
    }

    public function index()
    {
        $category_all = $this->category_all;
        $product_all = DB::table('products')
        ->join('categories', 'products.category_id', '=', 'categories.id')
                ->where('delProduct', 0)
                ->select('products.*', 'categories.nameCategory')
                ->limit('7')
                ->get();
                $product_all_new = DB::table('products')
                ->where('delProduct', 0)
                ->select('*')
                ->limit(20)
                ->orderBy('dateUp','DESC')
                ->get();
                $product_good_price = DB::table('products')
                ->join('categories', 'products.category_id', '=', 'categories.id')
                ->where('delProduct', 0)
                ->select('products.*', 'categories.nameCategory')
                ->limit(7)
                ->orderBy('price','ASC')
                ->get();
        return view("member.index",compact('category_all','product_all','product_all_new','product_good_price'));
    }

    public function detail($id)
    {
        $category_all = $this->category_all;
        $product_by_id = DB::table('products')
        ->join('categories', 'products.category_id', '=', 'categories.id')
        ->where('delProduct', 0)
        ->where('products.id', $id)
        ->select('products.*', 'categories.nameCategory')
        ->first();
        $product_relation=DB::table('products')
        ->join('categories', 'products.category_id', '=', 'categories.id')
        ->where('delProduct', 0)
        ->where('products.id','!=', $id)
        ->where('category_id', $product_by_id->category_id)
        ->select('products.*', 'categories.nameCategory')
        ->get();
        $product_color=DB::table('product_color')
        ->where('delColor', 0)
        ->where('quantity', '>',0)
        ->where('product_id', $id)
        ->select('*')
        ->get();
        $product_image=DB::table('product_image')
        ->where('product_id', $id)
        ->select('*')
        ->get();
        return view("member.detail",compact('category_all','product_by_id','product_relation','product_color','product_image'));
    }
    
    public function category($id)
    {
        $category_all = $this->category_all;
        $category_by_id = DB::table('categories')
                ->where('delCategory', 0)
                ->where('id', $id)
                ->select('*')
                ->first();
                $product_by_category=DB::table('products')
        ->where('delProduct', 0)
        ->where('category_id', $id)
        ->select('*')
        ->get();
        return view("member.category",compact('category_all','category_by_id','product_by_category'));
    }
    public function about()
    {
        $category_all = $this->category_all;
        return view("member.about",compact('category_all'));
    }
    public function sale()
    {
        $category_all = $this->category_all;
        return view("member.sale",compact('category_all'));
    }
    public function cart()
    {
        $tong=0;
        $category_all = $this->category_all;
        $cart=DB::table('carts')
        ->join('products', 'carts.product_id', '=', 'products.id')
        ->join('product_color', 'carts.color_id', '=', 'product_color.id')
        ->where('user_id', Auth::user()->id)
        ->select('products.nameProduct','products.codeProduct','products.mainImage','products.price','product_color.nameColor','product_color.codeColor','carts.quantity','carts.total','carts.id')
        ->get();

        $method=DB::table('method')
        ->select('*')
        ->get();
        foreach ($cart as $key => $value) {
            $tong+=$value->total;
        }
        return view("member.cart",compact('category_all','cart','tong','method'));
    }
    public function search(Request $request)
    {
        $category_all = $this->category_all;
        $searchText1 = '%' . $request->searchText . '%'; 
        $product_by_search = DB::table('products')
                ->join('categories', 'products.category_id', '=', 'categories.id')
                ->where('nameProduct', 'like', $searchText1)
                ->where('delProduct', 0)
                ->select('products.*', 'categories.nameCategory')
                ->get();
        $searchText=$request->searchText;
        return view("member.search",compact('category_all','product_by_search','searchText'));
    }
    public function product()
    {
        $category_all = $this->category_all;
        $product_all = DB::table('products')
                ->join('categories', 'products.category_id', '=', 'categories.id')
                ->where('delProduct', 0)
                ->select('products.*', 'categories.nameCategory')
                ->get();
        return view("member.all",compact('category_all','product_all'));
    }

    
    public function benhvemat()
    {
        $category_all = $this->category_all;
        return view("member.benhvemat",compact('category_all'));
    }
    public function goctuvan()
    {
        $category_all = $this->category_all;
        return view("member.goctuvan",compact('category_all'));
    }
        public function tintucveVENUS()
    {
        $category_all = $this->category_all;
        return view("member.tintucveVENUS",compact('category_all'));
    }
    public function kienthucchung()
    {
        $category_all = $this->category_all;
        return view("member.kienthucchung",compact('category_all'));
    }



    public function order()
    {
        $category_all = $this->category_all;
        $status_order = DB::table('status_order')
                ->select('*')
                ->get();

                $orders = DB::table('orders')
                ->join('users', 'orders.user_id', '=', 'users.id')
                ->join('vouchers', 'orders.voucherId', '=', 'vouchers.id')
                ->join('method', 'orders.methodPay', '=', 'method.id')
                ->join('status_order', 'orders.status', '=', 'status_order.id')
                ->select('orders.id','orders.dateOrder','orders.totalOrder','orders.status','users.name','method.nameMethod','status_order.nameStatus','vouchers.nameVoucher','vouchers.discount')
                ->where('user_id',Auth::user()->id)
                ->get();
                    return view("member.order",compact('category_all','status_order','orders'));
    }
}
