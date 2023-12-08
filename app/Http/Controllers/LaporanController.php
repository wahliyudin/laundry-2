<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Konsumen;
use App\Models\Transaksi;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function __construct(
        protected Helper $helper
    ) {
    }

    public function index()
    {
        return view('admin.laporan.index', [
            'konsumens' => Konsumen::query()->get()
        ]);
    }

    public function datatable(Request $request)
    {
        [$startDate, $endDate] = Helper::getRangeInCarbon($request->range, false);
        $transaksis = Transaksi::query()
            ->when($startDate && $endDate, function ($query) use ($startDate, $endDate) {
                $query->whereBetween('tanggal_masuk', [$startDate->format('Y-m-d'), $endDate->format('Y-m-d')]);
            })
            ->when($request->konsumen_id, function ($query, $konsumen_id) {
                $query->where('konsumen_id', $konsumen_id);
            })
            ->when($request->status, function ($query, $status) {
                $query->where('status', $status);
            })
            ->get();
        return datatables()->of($transaksis)
            ->editColumn('tanggal_masuk', function ($transaksi) {
                return Carbon::parse($transaksi->tanggal_masuk)->translatedFormat('d F Y');
            })
            ->editColumn('konsumen', function ($transaksi) {
                return $transaksi->konsumen?->nama;
            })
            ->editColumn('paket', function ($transaksi) {
                return $transaksi->paket?->nama;
            })
            ->addColumn('grand_total', function ($transaksi) {
                return $this->helper->formatRupiah($transaksi->paket?->harga * $transaksi->berat, true);
            })
            ->editColumn('tanggal_ambil', function ($transaksi) {
                return $transaksi->tanggal_ambil ? Carbon::parse($transaksi->tanggal_ambil)->translatedFormat('d F Y') : '-';
            })
            ->editColumn('status', function ($transaksi) {
                return $transaksi->status?->badge();
            })
            ->rawColumns(['action', 'status'])
            ->make();
    }

    public function printPdf(Request $request)
    {
        [$startDate, $endDate] = Helper::getRangeInCarbon($request->range);
        $transaksis = Transaksi::query()
            ->whereBetween('tanggal_masuk', [$startDate->format('Y-m-d'), $endDate->format('Y-m-d')])
            ->when($request->konsumen_id, function ($query, $konsumen_id) {
                $query->where('konsumen_id', $konsumen_id);
            })
            ->when($request->status, function ($query, $status) {
                $query->where('status', $status);
            })
            ->get();
        $pdf = Pdf::loadView('admin.laporan.document', [
            'transaksis' => $transaksis,
            'startDate' => $startDate->translatedFormat('d F Y'),
            'endDate' => $endDate->translatedFormat('d F Y'),
        ]);
        return $pdf->stream('laporan.pdf');
    }
}
