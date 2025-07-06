<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class AdminAuthController extends Controller
{
     public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $admin = Admin::where('username', $request->username)->first();

        if ($admin && Hash::check($request->password, $admin->password)) {
            session(['is_admin_logged_in' => true]);
            return redirect()->route('tickets.dashboard');
        }

        return back()->with('error', 'Username atau password salah.');
    }

    public function logout()
    {
        session()->forget('is_admin_logged_in');
        return redirect()->route('admin.login');
    }

}
