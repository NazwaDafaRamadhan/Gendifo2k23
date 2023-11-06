<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    public function index(){
        $pageTitle = 'Data Pengguna';
        $user = DB::table('users')->get();
        return view('admin.list-user.user', compact('pageTitle','user'));
    }

    public function showForModal($id) {
        $user = DB::table('users')->where('id_user', $id)->first();
    
        return response()->json($user);
    }

    public function update(Request $request) {
        // return $request;
        $currentStatus = DB::table('users')
        ->where('id_user', $request->input('id_user'))
        ->value('status');
        
        // Ambil data dari form
        $namaPengguna = $request->input('nama');
        $passwordPengguna = $request->input('password');
        $emailPengguna = $request->input('email');
        $statusPengguna = $request->input('status');
        $rolePengguna = $request->input('user_role');

        // Definisikan data yang akan diperbarui
        $updateData = [
            'nama' => $namaPengguna,
            'password' => $passwordPengguna,
            'email' => $emailPengguna,
            'user_role' => $rolePengguna,
        ];

        // Periksa apakah status pengguna berubah menjadi "Active"
        if ($statusPengguna === 'Active' && $currentStatus !== 'Active') {
            $updateData['approved_at'] = now();
        }

        $updateData['status'] = $statusPengguna;

        DB::table('users')
        ->where('id_user', $request->input('id_user'))
        ->update($updateData);
    
        // Redirect atau kirim respons sesuai kebutuhan Anda
        return redirect('/user-admin')->with('success', 'Berhasil mengubah data produk.');
    }

    public function delete($id)
    {
        $user = DB::table('users')->where('id_user', $id)->first();
    
        if ($user) {
            
            // Hapus entri produk dari database
            DB::table('users')->where('id_user', $id)->delete();
            
            return redirect('/user-admin')->with('success', 'Berhasil hapus pengguna.');
        } else {
            return redirect('/user-admin')->with('error', 'Data produk tidak ditemukan.');
        }
    }
}
