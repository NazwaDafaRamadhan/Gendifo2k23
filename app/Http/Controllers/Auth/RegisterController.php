<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function register(Request $request)
    {
        // return $request;

        // Validasi data yang diterima dari form registrasi
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'user_role' => 'required',
            'status' => 'required',
        ]);
    
        if ($validator->fails()) {
            return redirect('register')
                ->withErrors($validator)
                ->withInput();
        }
    
        $user = User::create([
            'nama' => $request->input('nama'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'user_role' => $request->input('user_role'),
            'status' => $request->input('status'),
        ]);

        if ($user->status === 'Non-Active') {
            // Jika status pengguna "Non-Active," arahkan ke halaman khusus
            return redirect('/not-confirmed')->with('warning', 'Anda belum konfirmasi akun.');
        }
    
        // Lakukan tindakan sesuai kebutuhan setelah berhasil mendaftar.
        Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')]);
    
        return redirect('/dashboard')->with('success', 'Pendaftaran berhasil!');
    }

    public function index() {
        return view('auth.register');
    }
}
