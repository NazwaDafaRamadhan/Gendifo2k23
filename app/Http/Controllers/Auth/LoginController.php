<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Action;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function index (){
        $pageTitle = 'Dashboard Admin';

        if (Auth::check()) {
            return redirect('/dashboard'); // Mengarahkan pengguna yang sudah login ke halaman dashboard
        }

        return view('auth.login', compact('pageTitle'));
    }

    public function authenticate(Request $request) {
        $credentials = $request-> validate([
            'email' => 'required|email:dns',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/dashboard');
        }

        return back()-> with('error', 'Mohon periksa kembali email dan password anda');
    }   

    public function logout(Request $request) {
        Auth::logout(); 
        $request->session()->invalidate(); // Menghapus sesi pengguna
        $request->session()->regenerateToken(); // Menghasilkan token sesi baru

        return redirect('/login'); // Mengarahkan pengguna ke halaman login atau halaman lain yang sesuai
    }
}
