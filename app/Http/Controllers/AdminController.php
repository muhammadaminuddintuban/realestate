<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Hash as FacadesHash;

class AdminController extends Controller
{
    public function AdminDashboard(Request $request)
    {
        $user = User::selectRaw('count(id) as count, DATE_FORMAT(created_at, "%Y-%m") as month')
                ->groupBy('month')
                ->orderBy('month', 'asc')
                ->get();

                $data['months'] = $user->pluck('month');
                $data['counts'] = $user->pluck('count');

        return view('admin.index', $data);
    }

    public function AdminLogout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('admin/login');
    }

    public function AdminLogin(Request $request)
    {
        return view('admin.admin_login');
    }

    public function admin_profile(Request $request)
    {
        $data['getRecord'] = User::find(Auth::user()->id);
        return view('admin.admin_profile', $data);
    }

    public function admin_profile_update(Request $request)
    {
        $user = request()->validate([
            'email' => 'required|unique:users,email,'.Auth::user()->id
        ]);

        $user = User::find(Auth::user()->id);
        $user->name       = trim($request->name);
        $user->username   = trim($request->username);
        $user->email      = trim($request->email);
        $user->phone      = trim($request->phone);

        if(!empty($request->password)){
            $user->password   = Hash::make($request->password);
        }

        if(!empty($request->file('photo'))){
            $file = $request->file('photo');
            $randomStr = Str::random(30);
            $filename = $randomStr.'.'.$file->getClientOriginalExtension();
            $file->move('upload/', $filename);
            $user->photo = $filename;
        }

        $user->address   = trim($request->address);
        $user->save();
        return redirect('admin/profile')->with('success', 'Profile Updated Successfully..');
    }

    public function admin_users(Request $request)
    {
        $users = User::paginate(10);
        return view('admin.users.list', compact('users'));
    }

    public function admin_users_view($id)
    {
    $user = User::find($id);

    if (!$user) {
        return redirect()->back()->with('error', 'Pengguna tidak ditemukan.');
    }

    return view('admin.users.view', compact('user'));
    }

}
