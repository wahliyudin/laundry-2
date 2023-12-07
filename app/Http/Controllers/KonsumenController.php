<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KonsumenController extends Controller
{
    public function index()
    {
        return view('admin.konsumen.index');
    }
}
