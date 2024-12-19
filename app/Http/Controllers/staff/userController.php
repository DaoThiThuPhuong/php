<?php
namespace App\Http\Controllers\staff;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class userController
{
    // Hiển thị danh sách khách hàng với tìm kiếm theo tên
    public function index(Request $request)
    {
        $search = $request->input('search'); // Lấy giá trị từ ô tìm kiếm
        $user_all = DB::table('users')
            ->when($search, function ($query, $search) {
                return $query->where('name', 'like', "%$search%");
            })
            ->where('role_id', '!=', 1) // Loại bỏ admin chính
            ->get();

        return view('admin.user', compact('user_all', 'search'));
    }

    public function lockUser($id)
    {
        DB::table('users')
            ->where('id', $id)
            ->where('role_id', '!=', 1)
            ->update(['delUser' => 1]);

        return back()->with('success', 'Người dùng đã bị khóa thành công!');
    }

    public function unLockUser($id)
    {
        DB::table('users')
            ->where('id', $id)
            ->where('role_id', '!=', 1)
            ->update(['delUser' => 0]);

        return back()->with('success', 'Người dùng đã được mở khóa thành công!');
    }
}
