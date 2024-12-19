<?php
namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class voucherController
{

    public function lock($id){
        DB::table('vouchers')
        ->where('id', $id)
        ->update([
        'delVoucher' => 1,
        ]);
        return back();
    }

    public function unLock($id){
        DB::table('vouchers')
        ->where('id', $id)
        ->update([
        'delVoucher' => 0,
        ]);
        return back();
    }

    public function update(Request $request,$id){
        DB::table('vouchers')
        ->where('id', $id)
        ->update([
            'nameVoucher' => $request->input('nameVoucher'),
            'discount' => $request->input('discount')
        ]);
        return back();
    }
    public function store(Request $request){
        DB::table('vouchers')->insert([
            'nameVoucher' => $request->input('nameVoucher'),
            'discount' => $request->input('discount')
        ]);
        return back();
    }
}
