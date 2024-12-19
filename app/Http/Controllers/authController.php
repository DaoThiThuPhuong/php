<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class authController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password) || $user->delUser == 1) {
            return redirect('/auth');
        }

        Auth::login($user);
        switch (Auth::user()->role_id) {
            case 1:
                return redirect('/admin');
            case 2:
                return redirect('/staff');
            case 3:
                return redirect('/');
            default:
                return redirect('/');
        }
    }

    public function auth()
    {
        return view("member.auth");
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'phone' => 'required|string|max:10',
            'address' => 'required|string|max:255',
            'password' => 'required|string|min:8',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'password' => Hash::make($request->password),
            'role_id' => 3,
        ]);
        return redirect('/auth');
    }

    public function registerForStaff(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'phone' => 'required|string|max:10',
            'address' => 'required|string|max:255',
            'password' => 'required|string|min:8',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'password' => Hash::make($request->password),
            'role_id' => 2,
        ]);
        return back();
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function index(Request $request)
    {
        $search = $request->input('search');
        $user_all = User::where('role_id', 2)
            ->when($search, function ($query, $search) {
                $query->where('name', 'like', "%$search%");
            })
            ->get();

        $notFound = $search && $user_all->isEmpty();

        return view('admin.staff', compact('user_all', 'search', 'notFound'));
    }

    public function lockUser($id)
    {
        User::where('id', $id)
            ->where('role_id', '!=', 1)
            ->update(['delUser' => 1]);

        return back()->with('success', 'Nhân viên đã bị khóa thành công!');
    }

    public function unLockUser($id)
    {
        User::where('id', $id)
            ->where('role_id', '!=', 1)
            ->update(['delUser' => 0]);

        return back()->with('success', 'Nhân viên đã được mở khóa thành công!');
    }
}
// comment