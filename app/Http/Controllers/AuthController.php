<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    
    public function register(Request $request){
         // Validasi data input
         $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Buat pengguna baru
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Enkripsi password
        ]);

        // Login otomatis setelah registrasi
        Auth::login($user);

        // Redirect ke halaman dashboard
        return redirect(route('dashboard.index'))->with('success', 'Registrasi berhasil. Selamat datang!');
    
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