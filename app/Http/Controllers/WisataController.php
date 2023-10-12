<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class WisataController extends Controller
{
    public function index(){
        $pageTitle = 'Data Wisata';
        $wisata = DB::table('wisata')->get();
        return view('admin.list-wisata.wisata', compact('pageTitle','wisata'));
    }

    public function input(Request $request) {
        // dd($request->all());

        DB::table('wisata')->insert([
            'wisata' => $request->wisata,
            'deskripsi' => $request->deskripsi,
            'kontak' => $request->kontak,
        ]);
        return redirect('/wisata')->with('success','Berhasil menambahkan wisata');
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
    
        // Update data produk dalam database
        DB::table('wisata')
            ->where('id_wisata', $request->input('id_wisata'))
            ->update([
                'wisata' => $namaWisata,
                'kontak' => $kontakWisata,
                'deskripsi' => $deskripsiWisata,
            ]);
    
        // Redirect atau kirim respons sesuai kebutuhan Anda
        return response()->json(['url' => '/wisata', 'message' => 'Berhasil mengubah data', 'success' => true]);    
    }
}
