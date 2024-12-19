<?php
namespace App\Http\Controllers\member;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class cartController
{
    // Thêm sản phẩm vào giỏ hàng
    public function add(Request $request, $id)
    {
        $product = DB::table('products')->where('id', $id)->first();
        $product_color = DB::table('product_color')->where('id', $request->input('color_id'))->first();

        if ($product && $product_color->quantity > 0) {
            $cart = DB::table('carts')
                ->where('user_id', Auth::user()->id)
                ->where('product_id', $id)
                ->where('color_id', $product_color->id)
                ->first();

            if ($cart) {
                $newQuantity = $cart->quantity + 1;
                if ($newQuantity <= $product_color->quantity) {
                    DB::table('carts')->where('id', $cart->id)->update([
                        'quantity' => $newQuantity,
                        'total' => $newQuantity * $product->price,
                    ]);
                } else {
                    return back()->with('fail', 'Số lượng sản phẩm tồn kho không đủ, vui lòng chọn lại!');
                }
            } else {
                DB::table('carts')->insert([
                    'user_id' => Auth::user()->id,
                    'product_id' => $id,
                    'color_id' => $product_color->id,
                    'quantity' => 1,
                    'total' => $product->price,
                ]);
            }
            return back()->with('success', 'Thêm vào giỏ hàng thành công!');
        }
        return back()->with('fail', 'Sản phẩm không khả dụng!');
    }

    // Cập nhật số lượng trong giỏ hàng
    public function updateCartQuantity(Request $request, $id)
    {
        $newQuantity = $request->input('quantity');

        if ($newQuantity < 1) {
            return back()->with('fail', 'Số lượng phải lớn hơn hoặc bằng 1!');
        }

        $cartItem = DB::table('carts')
            ->where('id', $id)
            ->where('user_id', Auth::user()->id)
            ->first();

        if ($cartItem) {
            $product = DB::table('products')->where('id', $cartItem->product_id)->first();
            $product_color = DB::table('product_color')->where('id', $cartItem->color_id)->first();

            if ($newQuantity > $product_color->quantity) {
                return back()->with('fail', 'Số lượng sản phẩm tồn kho không đủ, vui lòng chọn lại!');
            }

            DB::table('carts')->where('id', $id)->update([
                'quantity' => $newQuantity,
                'total' => $newQuantity * $product->price,
            ]);
            return back()->with('success', 'Cập nhật số lượng thành công!');
        }

        return back()->with('fail', 'Sản phẩm không tồn tại trong giỏ hàng!');
    }

    // Xóa sản phẩm khỏi giỏ hàng
    public function delCartItem($id)
    {
        DB::table('carts')->where('id', $id)->where('user_id', Auth::user()->id)->delete();
        return back()->with('success', 'Xóa sản phẩm thành công!');
    }

    // Thanh toán
    public function checkout(Request $request)
    {
        return back()->with('success', 'Thanh toán thành công!');
    }
}
