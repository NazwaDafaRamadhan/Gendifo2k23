<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
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
        // dd($request->all());

        // Validasi data yang diunggah oleh pengguna
        $validasiData = $request->validate([
            'gambar' => 'required|file|image|mimes:jpeg,png,jpg|max:1024',
            'produk' => 'required',
            'deskripsi' => 'required',
            'kontak' => 'required',
            'notelp' => 'required',
            'video' => 'mimes:mp4,avi,mov|max:5120000', // 5 GB
        ]);

        $validasiData['singkat'] = Str::limit(strip_tags($request->deskripsi),150);
    
        // Simpan file yang diunggah ke direktori "gambar-gendro"
        if ($request->hasFile('gambar')) {
            $pathGambar = $request->file('gambar')->store('gambar-gendro');
        } else {
            $pathGambar = ''; // Atur default jika tidak ada file diunggah
        }

        if ($request->hasFile('video')) {
            $pathVideo = $request->file('video')->store('video-gendro');
        } else {
            $pathVideo = ''; // Atur default jika tidak ada file diunggah
        }
    
        // Simpan data ke database menggunakan DB::table
        DB::table('produk')->insert([
            'produk' => $validasiData['produk'],
            'deskripsi' => $validasiData['deskripsi'],
            'singkat' => $validasiData['singkat'],
            'kontak' => $validasiData['kontak'],
            'notelp' => $validasiData['notelp'],
            'gambar' => $pathGambar,
            'video' => $pathVideo,
            'link_post_ig' => $request->input('link_post_ig'),
            'link_post_tiktok' => $request->input('link_post_tiktok'),
            'link_post_yt' => $request->input('link_post_yt'),
            'created_by' => $request->input('created_by'),
            'created_at' => now(),
        ]);
    
        return redirect('/produk-admin')->with('success', 'Berhasil menambahkan data produk');
    }
    
    public function showForModal($id) {
        $produk = DB::table('produk')->where('id_produk', $id)->first();
    
        return response()->json($produk);
    }
    
    public function update(Request $request) {
        // return $request;
        
        // Ambil data dari form
        $namaProduk = $request->input('produk');
        $kontakProduk = $request->input('kontak');
        $deskripsiProduk = $request->input('deskripsi');
        $noTelepon = $request->input('notelp');
        $linkIg = $request->input('link_post_ig');
        $linkTiktok = $request->input('link_post_tiktok');
        $linkYt = $request->input('link_post_yt');

        $singkatProduk = Str::limit(strip_tags($request->input('deskripsi')), 150);

        $oldVideoPath = DB::table('produk')->where('id_produk', $request->input('id_produk'))->value('video');

        $oldImagePath = DB::table('produk')->where('id_produk', $request->input('id_produk'))->value('gambar');
        
        // Ambil gambar yang diunggah 
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($oldImagePath) {
                Storage::delete($oldImagePath);
            }
        
            // Simpan gambar baru
            $pathGambar = $request->file('gambar')->store('gambar-gendro');
        } else {
            $pathGambar = $oldImagePath;
        }        

        // Ambil video yang diunggah 
        if ($request->hasFile('video')) {
            // Hapus video lama jika ada
            if ($oldVideoPath) {
                Storage::delete($oldVideoPath);
            }
        
            // Simpan video baru
            $pathVideo = $request->file('video')->store('video-gendro');
            } else {
                $pathVideo = $oldVideoPath;
            }

        // Update data produk dalam database
        DB::table('produk')
            ->where('id_produk', $request->input('id_produk'))
            ->update([
                'produk' => $namaProduk,
                'kontak' => $kontakProduk,
                'deskripsi' => $deskripsiProduk,
                'notelp'=> $noTelepon,
                'link_post_ig' => $linkIg,
                'link_post_tiktok' => $linkTiktok,
                'link_post_yt' => $linkYt,
                'gambar'=> $pathGambar,
                'video'=> $pathVideo,
                'updated_at' => now(),
                'singkat' => $singkatProduk,
            ]);
    
        // Redirect atau kirim respons sesuai kebutuhan Anda
        return redirect('/produk-admin')->with('success', 'Berhasil mengubah data produk.');
    }
    
    public function delete($id)
    {
        $produk = DB::table('produk')->where('id_produk', $id)->first();
    
        if ($produk) {
            // Hapus video dan gambar terkait
            if (!empty($produk->video)) {
                Storage::delete($produk->video);
            }
    
            if (!empty($produk->gambar)) {
                Storage::delete($produk->gambar);
            }
    
            // Hapus entri produk dari database
            DB::table('produk')->where('id_produk', $id)->delete();
            
            return redirect('/produk-admin')->with('success', 'Berhasil hapus produk.');
        } else {
            return redirect('/produk-admin')->with('error', 'Data produk tidak ditemukan.');
        }
    }
    
}   