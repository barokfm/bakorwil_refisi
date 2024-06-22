<?php

namespace App\Http\Controllers;

use App\Models\Gedung;
use Illuminate\Http\Request;

class GedungController extends Controller
{
    public function index(){

        $gedungs = Gedung::all();

        return view('home', [
            'title' => 'Home',
            'gedungs' => $gedungs
        ]);
    }
}
