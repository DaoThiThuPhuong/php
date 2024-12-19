<?php
namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class colorController
{

    public function lock($id){
        DB::table('product_color')
        ->where('id', $id)
        ->update([
        'delColor' => 1,
        ]);
        return back();
    }

    public function unLock($id){
        DB::table('product_color')
        ->where('id', $id)
        ->update([
        'delColor' => 0,
        ]);
        return back();
    }

    public function update(Request $request,$id){
        DB::table('product_color')
        ->where('id', $id)
        ->update([
        'nameColor' => $request->input('nameColor'),
        'codeColor' => $request->input('codeColor'),
        'quantity' => $request->input('quantity'),
        ]);
        return back();
    }

    public function store(Request $request,$id){
        DB::table('product_color')->insert([
          'nameColor' => $request->input('nameColor'),
        'codeColor' => $request->input('codeColor'),
        'quantity' => $request->input('quantity'),
        'product_id' => $id,
        ]);
        return back();
    }
}
