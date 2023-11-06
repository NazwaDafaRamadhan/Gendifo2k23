<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
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

    public function artikel($id) {
        $wisata = DB::table('wisata')->where('id_wisata', $id)->first();
        $pageTitle = 'Pariwisata';
        
        return view('visitor.wisata.view', compact('wisata', 'pageTitle'));
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
            'alamat' => $request->input('alamat'),
            'link_post_ig' => $request->input('link_post_ig'),
            'link_post_tiktok' => $request->input('link_post_tiktok'),
            'link_post_yt' => $request->input('link_post_yt'),
            'created_by' => $request->input('created_by'),
            'created_at' => now(),
        ]);
    
        return redirect('/wisata-admin')->with('success', 'Berhasil menambahkan data produk');
    }

    public function showForModal($id) {
        $wisata = DB::table('wisata')->where('id_wisata', $id)->first();
    
        return response()->json($wisata);
    }
    
    public function update(Request $request) {
        // return $request;
        
        // Ambil data dari form
        $namaWisata = $request->input('wisata');
        $kontakWIsata = $request->input('kontak');
        $deskripsiWisata = $request->input('deskripsi');
        $noTelepon = $request->input('notelp');
        $linkIg = $request->input('link_post_ig');
        $linkTiktok = $request->input('link_post_tiktok');
        $linkYt = $request->input('link_post_yt');
        $alamatWisata = $request->input('alamat');

        $singkatWisata = Str::limit(strip_tags($request->input('deskripsi')), 200);

        $oldImagePath = DB::table('wisata')->where('id_wisata', $request->input('id_wisata'))->value('gambar');
        
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
        DB::table('wisata')
            ->where('id_wisata', $request->input('id_wisata'))
            ->update([
                'wisata' => $namaWisata,
                'kontak' => $kontakWIsata,
                'deskripsi' => $deskripsiWisata,
                'notelp'=> $noTelepon,
                'link_post_ig' => $linkIg,
                'link_post_tiktok' => $linkTiktok,
                'link_post_yt' => $linkYt,
                'gambar'=> $path,
                'alamat' => $alamatWisata,
                'updated_at' => now(),
                'singkat' => $singkatWisata,
            ]);
    
        // Redirect atau kirim respons sesuai kebutuhan Anda
        return redirect('/wisata-admin')->with('success', 'Berhasil mengubah data wisata.');
    }

    public function delete($id)
    {
        $wisata = DB::table('wisata')->where('id_wisata', $id)->first();
    
        if ($wisata) {
    
            if (!empty($wisata->gambar)) {
                Storage::delete($wisata->gambar);
            }
    
            // Hapus entri wisata dari database
            DB::table('wisata')->where('id_wisata', $id)->delete();
            
            return redirect('/wisata-admin')->with('success', 'Berhasil hapus tempat wisata.');
        } else {
            return redirect('/wisata-admin')->with('error', 'Tempat wisata tidak ditemukan.');
        }
    }
}
