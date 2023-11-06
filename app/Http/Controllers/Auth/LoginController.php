<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Action;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function index (){
        $pageTitle = 'Login Admin';

        if (Auth::check()) {
            return redirect('/dashboard'); // Mengarahkan pengguna yang sudah login ke halaman dashboard
        }

        return view('auth.login', compact('pageTitle'));
    }

    public function authenticate(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required',
        ]);
    
        if (Auth::attempt($credentials)) {
            $user = Auth::user(); // Dapatkan pengguna yang telah terotentikasi
    
            if ($user->status === 'Active') {
                $request->session()->regenerate();
                return redirect()->intended('/dashboard');
            } else {
                Auth::logout(); // Logout pengguna jika statusnya "Non-Active"
                return redirect('/not-confirmed')->with('warning', 'Akun Anda belum dikonfirmasi.');
            }
        }
    
        return back()->with('error', 'Mohon periksa kembali email dan password Anda');
    }

    public function logout(Request $request) {
        Auth::logout(); 
        $request->session()->invalidate(); // Menghapus sesi pengguna
        $request->session()->regenerateToken(); // Menghasilkan token sesi baru

        return redirect('/login'); // Mengarahkan pengguna ke halaman login atau halaman lain yang sesuai
    }
}
