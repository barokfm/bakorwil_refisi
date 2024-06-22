<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Peminjam;
use App\Models\Peralatan;

class DashboardController extends Controller
{
    public function index(){

        $jumlahPengaju = Peminjam::count();
        $jumlahAlat = Peralatan::count();
        $jumlahUser = User::count();

        return view('user.dashboard', [
            'title' => 'Dashboard'
        ], compact('jumlahPengaju', 'jumlahAlat', 'jumlahUser'));
    }
}
