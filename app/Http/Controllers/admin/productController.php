<?php
namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class productController
{

    public function lock($id){
        DB::table('products')
        ->where('id', $id)
        ->update([
        'delProduct' => 1,
        ]);
        return back();
    }

    public function unLock($id){
        DB::table('products')
        ->where('id', $id)
        ->update([
        'delProduct' => 0,
        ]);
        return back();
    }

    public function detailProduct($id){
        $category_all = DB::table('categories')
                ->where('delCategory', 0)
                ->select('*')
                ->get();
                $product_color = DB::table('product_color')
                ->where('product_id', $id)
                ->select('*')
                ->get();
                $product_image = DB::table('product_image')
                ->where('product_id', $id)
                ->select('*')
                ->get();
        $product_by_id=DB::table('products')
        ->where('id', $id)
        ->select('*')
        ->first();
        return view("admin.productdetail",compact('product_by_id','category_all','product_color','product_image'));
    }

    public function add(){
        $category_all = DB::table('categories')
                ->where('delCategory', 0)
                ->select('*')
                ->get();
       
        return view("admin.addproduct",compact('category_all'));
    }

    public function update(Request $request,$id){
        DB::table('products')
        ->where('id', $id)
        ->update([
        'codeProduct' => $request->input('codeProduct'),
        'material' => $request->input('material'),
        'price' => $request->input('price'),
        'nameProduct' => $request->input('nameProduct'),
        'mainImage' => $request->input('mainImage'),
        'descriptionProduct' => $request->input('descriptionProduct'),
        'category_id' => $request->input('category_id'),
        ]);
        return redirect('/admin/product');
    }
    public function store(Request $request){
        DB::table('products')->insert([
           'codeProduct' => $request->input('codeProduct'),
        'material' => $request->input('material'),
        'price' => $request->input('price'),
        'nameProduct' => $request->input('nameProduct'),
        'mainImage' => $request->input('mainImage'),
        'descriptionProduct' => $request->input('descriptionProduct'),
        'category_id' => $request->input('category_id'),
        ]);
        return redirect('/admin/product');
    }
}
