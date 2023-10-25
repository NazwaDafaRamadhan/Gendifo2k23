<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class ProdukController extends Controller
{
    public function index(){
        $pageTitle = 'Data Produk';
        $produk = DB::table('produk')->get();
        return view('admin.list-produk.produk', compact('pageTitle','produk'));
    }

    public function view() {
        $produk = DB::table('produk')->get();
        return view('visitor.produk.index', compact('produk'));
    }

    public function input(Request $request) {
        // Validasi data yang diunggah oleh pengguna
        $validasiData = $request->validate([
            'gambar' => 'required|file|image|mimes:jpeg,png,jpg|max:1024',
            'produk' => 'required',
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
        DB::table('produk')->insert([
            'produk' => $validasiData['produk'],
            'deskripsi' => $validasiData['deskripsi'],
            'singkat' => $validasiData['singkat'],
            'kontak' => $validasiData['kontak'],
            'notelp' => $validasiData['notelp'],
            'gambar' => $path,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    
        return redirect('/produk-admin')->with('success', 'Berhasil menambahkan data produk');
    }
    
    public function showForModal($id) {
        $produk = DB::table('produk')->where('id_produk', $id)->first();
    
        return response()->json($produk);
    }
    
    public function update(Request $request) {
        
        // Ambil data dari form
        $namaProduk = $request->input('produk');
        $kontakProduk = $request->input('kontak');
        $deskripsiProduk = $request->input('deskripsi');
        $noTelepon = $request->input('notelp');
        $gambarProduk = $request->input('gambar');
    
        // Update data produk dalam database
        DB::table('produk')
            ->where('id_produk', $request->input('id_produk'))
            ->update([
                'produk' => $namaProduk,
                'kontak' => $kontakProduk,
                'deskripsi' => $deskripsiProduk,
                'notelp'=> $noTelepon,
                'gambar'=> $gambarProduk,
            ]);
    
        // Redirect atau kirim respons sesuai kebutuhan Anda
        return response()->json(['url' => '/produk-admin', 'message' => 'Berhasil mengubah data', 'success' => true]);    
    }
    
    public function delete($id)
    {
        DB::table('produk')->where('id_produk', $id)->delete();
        return redirect('/produk-admin')->with('success', 'Berhasil hapus produk.');
    }
}    