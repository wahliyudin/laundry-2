<?php

namespace App\Http\Controllers;

use App\Models\Paket;

class WelcomeController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function datatablePaket()
    {
        $data = Paket::query()->get();
        return datatables()->of($data)
            ->make();
    }

    public function servicesDetail()
    {
        return view('service-detail');
    }
}
