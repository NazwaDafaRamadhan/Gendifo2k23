<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdukController extends Controller
{
    public function index(){
        $pageTitle = 'Data Produk';
        $produk = DB::table('produk')->get();
        return view('admin.list-produk.produk', compact('pageTitle','produk'));
    }

    public function input(Request $request) {
        // dd($request->all());

        DB::table('produk')->insert([
            'produk' => $request->produk,
            'deskripsi' => $request->deskripsi,
            'kontak' => $request->kontak,
        ]);
        return redirect('/produk')->with('success','Berhasil menambahkan data produk');
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
    
        // Update data produk dalam database
        DB::table('produk')
            ->where('id_produk', $request->input('id_produk'))
            ->update([
                'produk' => $namaProduk,
                'kontak' => $kontakProduk,
                'deskripsi' => $deskripsiProduk,
            ]);
    
        // Redirect atau kirim respons sesuai kebutuhan Anda
        return response()->json(['url' => '/produk', 'message' => 'Berhasil mengubah data', 'success' => true]);    
    }
}    