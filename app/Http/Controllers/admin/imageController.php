<?php
namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class imageController
{

    public function delete($id){
        DB::table('product_image')
        ->where('id', $id)
        ->delete();
        return back();
    }


    public function update(Request $request,$id){
        DB::table('product_image')
        ->where('id', $id)
        ->update([
        'linkImage' => $request->input('linkImage'),
        ]);
        return back();
    }

    public function store(Request $request,$id){
        DB::table('product_image')->insert([
          'linkImage' => $request->input('linkImage'),
        'product_id' => $id,
        ]);
        return back();
    }
}
