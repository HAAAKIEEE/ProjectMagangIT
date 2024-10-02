<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request){
        $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
        ]);
        if (Auth::attempt(["email" => $request->email, "password" => $request->password])) {
            return redirect(route('dashboard.index'))->with("success", "Sukses Login");
        } else {
            return redirect("login")->with("error", "Gagal Login");
        }
    }



    public function logout(Request $request) {
        // dd("logout");
        Auth::logout(); // Logout user
        
        // Hapus session dan regenerasi untuk keamanan
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        // Redirect ke halaman login
        return redirect()->route('login')->with('success', 'Anda telah berhasil logout.');
  
    }
}