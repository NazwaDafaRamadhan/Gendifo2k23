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
        dd($request->all());

        DB::table('budaya')->insert([
            'budaya' => $request->budaya,
            'deskripsi' => $request->deskripsi,
            'kontak' => $request->kontak,
        ]);
        return redirect('/budaya')->with('success','Berhasil menambahkan produk');
    }
}
