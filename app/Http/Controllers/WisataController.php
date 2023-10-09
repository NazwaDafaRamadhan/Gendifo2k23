<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WisataController extends Controller
{
    public function index(){
        $pageTitle = 'Data Wisata';
        return view('admin.list-wisata.wisata', compact('pageTitle'));
    }
}
