<?php
namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class categoryController
{

    public function lock($id){
        DB::table('categories')
        ->where('id', $id)
        ->update([
        'delCategory' => 1,
        ]);
        return back();
    }

    public function unLock($id){
        DB::table('categories')
        ->where('id', $id)
        ->update([
        'delCategory' => 0,
        ]);
        return back();
    }

    public function update(Request $request,$id){
        DB::table('categories')
        ->where('id', $id)
        ->update([
        'nameCategory' => $request->input('nameCategory')
        ]);
        return back();
    }
    public function store(Request $request){
        DB::table('categories')->insert([
            'nameCategory' => $request->input('nameCategory')
        ]);
        return back();
    }
}
