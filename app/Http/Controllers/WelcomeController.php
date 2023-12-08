<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Paket;

class WelcomeController extends Controller
{
    public function __construct(
        protected Helper $helper
    ) {
    }

    public function index()
    {
        return view('welcome');
    }

    public function datatablePaket()
    {
        $data = Paket::query()->get();
        return datatables()->of($data)
            ->editColumn('harga', function ($paket) {
                return $this->helper->formatRupiah($paket->harga, true);
            })
            ->make();
    }

    public function servicesDetail()
    {
        return view('service-detail');
    }
}
