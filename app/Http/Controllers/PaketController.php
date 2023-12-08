<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Http\Requests\Paket\StoreRequest;
use App\Models\Paket;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class PaketController extends Controller
{
    public function __construct(
        protected Helper $helper
    ) {
    }

    public function index()
    {
        return view('admin.paket.index');
    }

    public function datatable()
    {
        $data = Paket::query()->get();
        return datatables()->of($data)
            ->editColumn('harga', function ($paket) {
                return $this->helper->formatRupiah($paket->harga, true);
            })
            ->addColumn('action', function ($paket) {
                return view('admin.paket.action', compact('paket'))->render();
            })
            ->rawColumns(['action'])
            ->make();
    }

    public function edit(Paket $paket)
    {
        try {
            return response()->json($paket);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function nextKode()
    {
        try {
            $kode = IdGenerator::generate(['field' => 'kode', 'table' => 'paket', 'length' => 5, 'prefix' => 'P-']);
            return response()->json($kode);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function store(StoreRequest $request)
    {
        try {
            Paket::query()->updateOrCreate([
                'id' => $request->key
            ], [
                'kode' => $request->kode,
                'nama' => $request->nama,
                'harga' => $this->helper->resetToNumber($request->harga),
            ]);
            return response()->json([
                'message' => "Berhasil disimpan"
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function destroy(Paket $paket)
    {
        try {
            $paket->delete();
            return response()->json([
                'message' => "Berhasil dihapus"
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
