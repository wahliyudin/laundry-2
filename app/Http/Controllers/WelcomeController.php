<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Paket;
use App\Models\Transaksi;
use Illuminate\Http\Request;

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

    public function checkLaundry(Request $request)
    {
        return view('check-laundry', [
            'transaksis' => Transaksi::query()->where('kode', $request->kode)->get()
        ]);
    }
}
