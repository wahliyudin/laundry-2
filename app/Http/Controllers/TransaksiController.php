<?php

namespace App\Http\Controllers;

use App\Enums\Status;
use App\Enums\StatusBayar;
use App\Helpers\Helper;
use App\Http\Requests\Transaksi\BayarRequest;
use App\Http\Requests\Transaksi\StatusRequest;
use App\Http\Requests\Transaksi\StoreRequest;
use App\Models\Konsumen;
use App\Models\Paket;
use App\Models\Transaksi;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class TransaksiController extends Controller
{
    public function __construct(
        protected Helper $helper
    ) {
    }

    public function index()
    {
        return view('admin.transaksi.index', [
            'konsumens' => Konsumen::query()->get(),
            'pakets' => Paket::query()->get(),
        ]);
    }

    public function datatable()
    {
        $data = Transaksi::query()->with(['konsumen', 'paket'])->get();
        return datatables()->of($data)
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
            ->addColumn('action', function ($transaksi) {
                return view('admin.transaksi.action', compact('transaksi'))->render();
            })
            ->rawColumns(['action', 'status'])
            ->make();
    }

    public function edit(Transaksi $transaksi)
    {
        try {
            return response()->json([
                'kode' => $transaksi->kode,
                'tanggal_masuk' => Carbon::createFromFormat('Y-m-d H:i:s', $transaksi->tanggal_masuk)->format('m/d/Y'),
                'konsumen_id' => $transaksi->konsumen_id,
                'paket_id' => $transaksi->paket_id,
                'harga' => $transaksi->paket->harga,
                'berat' => $transaksi->berat,
                'total' => $transaksi->paket->harga * $transaksi->berat,
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function nextKode()
    {
        try {
            $kode = IdGenerator::generate(['field' => 'kode', 'table' => 'transaksi', 'length' => 5, 'prefix' => 'T-']);
            return response()->json($kode);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function show(Transaksi $transaksi)
    {
        return view('admin.transaksi.show', [
            'transaksi' => $transaksi
        ]);
    }

    public function store(StoreRequest $request)
    {
        try {
            $data = [
                'kode' => $request->kode,
                'tanggal_masuk' => Carbon::createFromFormat('m/d/Y', $request->tanggal_masuk)->format('Y-m-d'),
                // 'tanggal_ambil' => $request->tanggal_ambil,
                'konsumen_id' => $request->konsumen_id,
                'paket_id' => $request->paket_id,
                'berat' => $request->berat,
            ];
            if (!$request->key) {
                $data['status'] = Status::OPEN;
            }
            Transaksi::query()->updateOrCreate([
                'id' => $request->key
            ], $data);
            return response()->json([
                'message' => "Berhasil disimpan"
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function destroy(Transaksi $transaksi)
    {
        try {
            $transaksi->delete();
            return response()->json([
                'message' => "Berhasil dihapus"
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function updateStatus(StatusRequest $request)
    {
        try {
            Transaksi::query()->updateOrCreate([
                'id' => $request->key
            ], [
                'status' => Status::tryFrom($request->status)
            ]);
            return response()->json([
                'message' => "Status berhasil diedit"
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function bayar(BayarRequest $request)
    {
        try {
            Transaksi::query()->updateOrCreate([
                'id' => $request->key
            ], [
                'tanggal_ambil' => Carbon::createFromFormat('m/d/Y', $request->tanggal_ambil)->format('Y-m-d'),
                'status_bayar' => StatusBayar::tryFrom($request->status_bayar),
            ]);
            return response()->json([
                'message' => "Berhasil dibayar"
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function printPdf(Transaksi $transaksi)
    {
        $pdf = Pdf::loadView('admin.transaksi.invoice', [
            'transaksi' => $transaksi
        ]);
        return $pdf->stream($transaksi->kode . '.pdf');
    }
}
