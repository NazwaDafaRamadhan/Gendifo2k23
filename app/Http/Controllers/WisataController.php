<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class WisataController extends Controller
{
    public function index(){
        $pageTitle = 'Data Wisata';
        $wisata = DB::table('wisata')->get();
        return view('admin.list-wisata.wisata', compact('pageTitle','wisata'));
    }

    public function view() {
        $wisata = DB::table('wisata')->get();
        return view('visitor.wisata.index', compact('wisata'));
    }

    public function input(Request $request) {
        // Validasi data yang diunggah oleh pengguna
        $validasiData = $request->validate([
            'gambar' => 'required|file|image|mimes:jpeg,png,jpg|max:1024',
            'wisata' => 'required',
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
        DB::table('wisata')->insert([
            'wisata' => $validasiData['wisata'],
            'deskripsi' => $validasiData['deskripsi'],
            'singkat' => $validasiData['singkat'],
            'kontak' => $validasiData['kontak'],
            'notelp' => $validasiData['notelp'],
            'gambar' => $path,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    
        return redirect('/wisata-admin')->with('success', 'Berhasil menambahkan data produk');
    }

    public function showForModal($id) {
        $wisata = DB::table('wisata')->where('id_wisata', $id)->first();
    
        return response()->json($wisata);
    }
    
    public function update(Request $request) {
        
        // Ambil data dari form
        $namaWisata = $request->input('wisata');
        $kontakWisata = $request->input('kontak');
        $deskripsiWisata = $request->input('deskripsi');
        $noTelepon = $request->input('notelp');
        $gambarWisata = $request->input('gambar');
    
        // Update data produk dalam database
        DB::table('wisata')
            ->where('id_wisata', $request->input('id_wisata'))
            ->update([
                'wisata' => $namaWisata,
                'kontak' => $kontakWisata,
                'deskripsi' => $deskripsiWisata,
                'notelp'=> $noTelepon,
                'gambar'=> $gambarWisata,
            ]);
    
        // Redirect atau kirim respons sesuai kebutuhan Anda
        return response()->json(['url' => '/wisata-admin', 'message' => 'Berhasil mengubah data', 'success' => true]);    
    }

    public function delete($id)
    {
        DB::table('wisata')->where('id_wisata', $id)->delete();
        return redirect('/wisata-admin')->with('success', 'Berhasil hapus wisata.');
    }
}
