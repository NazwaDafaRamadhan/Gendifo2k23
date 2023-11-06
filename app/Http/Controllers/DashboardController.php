<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){
        $pageTitle = 'Dashboard Admin';
        $jmlproduk = DB::table('produk')->count();
        $jmlbudaya = DB::table('budaya')->count();
        $jmlwisata = DB::table('wisata')->count();
        $jmlkegiatan = DB::table('kegiatan')->count();

        
        return view('admin.dashboard', compact('pageTitle', 'jmlproduk', 'jmlbudaya', 'jmlwisata', 'jmlkegiatan'));
    }
}
