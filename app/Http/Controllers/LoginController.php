<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function showLogin()
    {
        return view('pages.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $admin = Admin::where('email', $request->email)->first();

        if ($admin && Hash::check($request->password, $admin->password)) {
            session([
                'admin_logged_in' => true,
                'admin_name' => $admin->name,
                'admin_email' => $admin->email,
            ]);

            return redirect()->route('bookings.list')->with('success', 'Login successful!');
        }

        return back()->with('error', 'Invalid email or password.');
    }

    public function logout()
    {
        session()->forget(['admin_logged_in', 'admin_name', 'admin_email']);
        return redirect()->route('login')->with('success', 'Logged out successfully!');
    }
}