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

    public function artikel($id) {
        $budaya = DB::table('budaya')->where('id_budaya', $id)->first();
        $pageTitle = 'Kebudayaan';
        
        return view('visitor.budaya.view', compact('budaya', 'pageTitle'));
    }    

    public function input(Request $request) {
        // dd($request->all());
        
        // Validasi data yang diunggah oleh pengguna
        $validasiData = $request->validate([
            'gambar' => 'required|file|image|mimes:jpeg,png,jpg|max:1024',
            'budaya' => 'required',
            'deskripsi' => 'required',
            'kontak' => 'required',
            'notelp' => 'required',
            'video' => 'mimes:mp4,avi,mov|max:5120000', // 5 GB
        ]);

        $validasiData['singkat'] = Str::limit(strip_tags($request->deskripsi),200);
    
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
        DB::table('budaya')->insert([
            'budaya' => $validasiData['budaya'],
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
    
        return redirect('/budaya-admin')->with('success', 'Berhasil menambahkan data produk');
    }
    

    public function showForModal($id) {
        $budaya = DB::table('budaya')->where('id_budaya', $id)->first();
    
        return response()->json($budaya);
    }
    
    public function update(Request $request) {
        // dd(request()->all());
                
        // Ambil data dari form
        $namaBudaya = $request->input('budaya');
        $kontakBudaya = $request->input('kontak');
        $deskripsiBudaya = $request->input('deskripsi');
        $noTelepon = $request->input('notelp');
        $linkIg = $request->input('link_post_ig');
        $linkTiktok = $request->input('link_post_tiktok');
        $linkYt = $request->input('link_post_yt');

        $singkatBudaya = Str::limit(strip_tags($request->input('deskripsi')), 200);

        $oldVideoPath = DB::table('budaya')->where('id_budaya', $request->input('id_budaya'))->value('video');

        $oldImagePath = DB::table('budaya')->where('id_budaya', $request->input('id_budaya'))->value('gambar');
        
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
        DB::table('budaya')
            ->where('id_budaya', $request->input('id_budaya'))
            ->update([
                'budaya' => $namaBudaya,
                'kontak' => $kontakBudaya,
                'deskripsi' => $deskripsiBudaya,
                'notelp'=> $noTelepon,
                'link_post_ig' => $linkIg,
                'link_post_tiktok' => $linkTiktok,
                'link_post_yt' => $linkYt,
                'gambar'=> $pathGambar,
                'video'=> $pathVideo,
                'updated_at' => now(),
                'singkat' => $singkatBudaya,
            ]);
    
        // Redirect atau kirim respons sesuai kebutuhan Anda
        return redirect('/budaya-admin')->with('success', 'Berhasil mengubah data kebudayaan.');
    }

    public function delete($id)
    {
        $budaya = DB::table('budaya')->where('id_budaya', $id)->first();
    
        if ($budaya) {
            // Hapus video dan gambar terkait
            if (!empty($budaya->video)) {
                Storage::delete($budaya->video);
            }
    
            if (!empty($budaya->gambar)) {
                Storage::delete($budaya->gambar);
            }
    
            // Hapus entri budaya dari database
            DB::table('budaya')->where('id_budaya', $id)->delete();
            
            return redirect('/budaya-admin')->with('success', 'Berhasil hapus kebudayaan.');
        } else {
            return redirect('/budaya-admin')->with('error', 'Kebudayaan tidak ditemukan.');
        }
    }
    
}
