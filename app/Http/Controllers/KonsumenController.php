<?php

namespace App\Http\Controllers;

use App\Http\Requests\Konsumen\StoreRequest;
use App\Models\Konsumen;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class KonsumenController extends Controller
{
    public function index()
    {
        return view('admin.konsumen.index');
    }

    public function datatable()
    {
        $data = Konsumen::query()->get();
        return datatables()->of($data)
            ->addColumn('action', function ($konsumen) {
                return view('admin.konsumen.action', compact('konsumen'))->render();
            })
            ->rawColumns(['action'])
            ->make();
    }

    public function edit(Konsumen $konsumen)
    {
        try {
            return response()->json($konsumen);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function nextKode()
    {
        try {
            $kode = IdGenerator::generate(['field' => 'kode', 'table' => 'konsumen', 'length' => 5, 'prefix' => 'K-']);
            return response()->json($kode);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function store(StoreRequest $request)
    {
        try {
            Konsumen::query()->updateOrCreate([
                'id' => $request->key
            ], [
                'kode' => $request->kode,
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'no_hp' => $request->no_hp,
            ]);
            return response()->json([
                'message' => "Berhasil disimpan"
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function destroy(Konsumen $konsumen)
    {
        try {
            $konsumen->delete();
            return response()->json([
                'message' => "Berhasil dihapus"
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
