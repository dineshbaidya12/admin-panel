<?php

namespace App\Http\Controllers\adminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function adminRedirect()
    {
        return redirect()->route('login');
    }

    public function login()
    {
        return view('admin/login');
    }

    public function adminLoginAction(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);

            $credentials = [
                'type' => 'admin',
                'email' => $request->email,
                'password' => $request->password,
            ];

            $remember = $request->has('remember-me');

            if (Auth::attempt($credentials, $remember)) {
                return redirect()->intended('admin/dashboard');
            }
            return redirect()->back()->with('error', 'Login credentials do not match.');
        } catch (\Exception $err) {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/admin/login');
    }
}
