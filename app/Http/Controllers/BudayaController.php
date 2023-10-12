<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BudayaController extends Controller
{
    public function index(){
        $pageTitle = 'Data Budaya';
        $budaya = DB::table('budaya')->get();
        return view('admin.list-budaya.budaya', compact('pageTitle','budaya'));
    }

    public function input(Request $request) {
        // dd($request->all());

        DB::table('budaya')->insert([
            'budaya' => $request->budaya,
            'deskripsi' => $request->deskripsi,
            'kontak' => $request->kontak,
        ]);
        return redirect('/budaya')->with('success','Berhasil menambahkan budaya');
    }

    public function showForModal($id) {
        $budaya = DB::table('budaya')->where('id_budaya', $id)->first();
    
        return response()->json($budaya);
    }
    
    public function update(Request $request) {
        
        // Ambil data dari form
        $namaBudaya = $request->input('budaya');
        $kontakBudaya = $request->input('kontak');
        $deskripsiBudaya = $request->input('deskripsi');
    
        // Update data produk dalam database
        DB::table('budaya')
            ->where('id_budaya', $request->input('id_budaya'))
            ->update([
                'budaya' => $namaBudaya,
                'kontak' => $kontakBudaya,
                'deskripsi' => $deskripsiBudaya,
            ]);
    
        // Redirect atau kirim respons sesuai kebutuhan Anda
        return response()->json(['url' => '/budaya', 'message' => 'Berhasil mengubah data', 'success' => true]);    
    }
}
