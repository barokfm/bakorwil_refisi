<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Logout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    function index()
    {

        echo "halo selamat datang " . Auth::user()->role . "</h1>";
        echo "<h1>" . Auth::user()->name . "</h1>";
        echo "<a href='logout'>Logout >></a>";
    }
}
