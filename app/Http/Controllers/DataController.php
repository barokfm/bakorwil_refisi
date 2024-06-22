<?php

namespace App\Http\Controllers;

use App\Models\Peminjam;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function index(){
        $peminjams = Peminjam::latest()->paginate(10);

        return view('user.data', [
            'title' => 'Data Peminjam'
        ], compact('peminjams'));
    }

}
