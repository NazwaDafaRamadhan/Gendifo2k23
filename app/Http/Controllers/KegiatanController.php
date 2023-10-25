<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KegiatanController extends Controller
{
    public function index(){
        $pageTitle = 'Data Kegiatan';
        $kegiatan = DB::table('kegiatan')->get();
        return view('admin.list-kegiatan.kegiatan', compact('pageTitle','kegiatan'));
    }

    public function input(Request $request) {
        // dd($request->all());

        DB::table('kegiatan')->insert([
            'kegiatan' => $request->kegiatan,
            'deskripsi' => $request->deskripsi,
            'kontak' => $request->kontak,
            'notelp' => $request->notelp,
            'tgl_kegiatan'=> $request->tgl_kegiatan,
        ]);
        return redirect('/kegiatan')->with('success','Berhasil menambahkan kegiatan');
    }

    public function delete ($id) {
        DB::table('kegiatan')->where('id_kegiatan', $id)->delete();
        return redirect('/kegiatan')->with('success', 'Berhasil hapus Kegiatan.');
    }
}
