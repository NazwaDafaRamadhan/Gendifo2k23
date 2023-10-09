<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $pageTitle = 'Dashboard Admin';
        return view('admin.dashboard', compact('pageTitle'));
    }
}
