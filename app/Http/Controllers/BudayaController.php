<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BudayaController extends Controller
{
    public function index(){
        $pageTitle = 'Data Budaya';
        $budaya = DB::table('budaya')->get();
        return view('admin.list-budaya.budaya', compact('pageTitle','budaya'));
    }

    public function view() {
        $budaya = DB::table('budaya')->get();
        return view('visitor.budaya.index', compact('budaya'));
    }

    public function artikel($id_budaya) {
        $budaya = DB::table('budaya')->find($id_budaya);
    
        return view('visitor.budaya.view')
            ->with('budaya', $budaya)
            ->with('title', 'Budaya Artikel'); // Optional, jika ingin mengatur judul halaman
    }    

    public function input(Request $request) {
        // Validasi data yang diunggah oleh pengguna
        $validasiData = $request->validate([
            'gambar' => 'required|file|image|mimes:jpeg,png,jpg|max:1024',
            'budaya' => 'required',
            'deskripsi' => 'required',
            'kontak' => 'required',
            'notelp' => 'required',
        ]);

        $validasiData['singkat'] = Str::limit(strip_tags($request->deskripsi),150);
    
        // Simpan file yang diunggah ke direktori "gambar-gendro"
        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('gambar-gendro');
        } else {
            $path = ''; // Atur default jika tidak ada file diunggah
        }
    
        // Simpan data ke database menggunakan DB::table
        DB::table('budaya')->insert([
            'budaya' => $validasiData['budaya'],
            'deskripsi' => $validasiData['deskripsi'],
            'singkat' => $validasiData['singkat'],
            'kontak' => $validasiData['kontak'],
            'notelp' => $validasiData['notelp'],
            'gambar' => $path,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    
        return redirect('/budaya-admin')->with('success', 'Berhasil menambahkan data produk');
    }
    

    public function showForModal($id) {
        $budaya = DB::table('budaya')->where('id_budaya', $id)->first();
    
        return response()->json($budaya);
    }
    
    public function update(Request $request) {
        // return $request;
        
        // Ambil data dari form
        $namaBudaya = $request->input('budaya');
        $kontakBudaya = $request->input('kontak');
        $deskripsiBudaya = $request->input('deskripsi');
        $noTelepon = $request->input('notelp');
        // $gambarBudaya = $request->input('gambar');

        $oldImagePath = DB::table('budaya')->where('id_budaya', $request->input('id_budaya'))->value('gambar');
        
        // Ambil gambar yang diunggah 
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($oldImagePath) {
                Storage::delete($oldImagePath);
            }
        
            // Simpan gambar baru
            $path = $request->file('gambar')->store('gambar-gendro');
        } else {
            $path = $oldImagePath;
        }        

        // Update data produk dalam database
        DB::table('budaya')
            ->where('id_budaya', $request->input('id_budaya'))
            ->update([
                'budaya' => $namaBudaya,
                'kontak' => $kontakBudaya,
                'deskripsi' => $deskripsiBudaya,
                'notelp'=> $noTelepon,
                'gambar'=> $path,
                'updated_at' => now(),
            ]);
    
        // Redirect atau kirim respons sesuai kebutuhan Anda
        return redirect('/budaya-admin')->with('success', 'Berhasil mengubah data kebudayaan.');
    }

    public function delete($id)
    {
        DB::table('budaya')->where('id_budaya', $id)->delete();
        return redirect('/budaya-admin')->with('success', 'Berhasil hapus kebudayaan.');
    }
}
