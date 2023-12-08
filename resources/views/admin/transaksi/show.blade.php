@extends('admin.layouts.app')

@section('breadcrumb')
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
        <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
            <li class="breadcrumb-item">
                <a href="{{ route('home') }}">
                    <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                        </path>
                    </svg>
                </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Data Konsumen</li>
        </ol>
    </nav>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center justify-content-end">
                <a href="{{ route('transaksi.print-pdf', $transaksi->getKey()) }}" target="_blank" class="btn btn-info">
                    <div class="d-flex align-items-center gap-2">
                        <svg class="icon icon-xs" fill="none" stroke="currentColor" stroke-width="1.5"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z">
                            </path>
                        </svg>
                        <span>Print PDF</span>
                    </div>
                </a>
            </div>
        </div>
        <div class="card-body">
            <table>
                <tbody>
                    <tr>
                        <td colspan="3">{{ config('app.name') }}</td>
                    </tr>
                    <tr>
                        <td>Telpon</td>
                        <td style="padding: 0 5px;">:</td>
                        <td>0858 xx xxx xxx</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td style="padding: 0 5px;">:</td>
                        <td>londrionline@gmail.com</td>
                    </tr>
                </tbody>
            </table>
            <hr>
            <table class="w-100">
                <tbody>
                    <tr>
                        <td style="width: 70%;">
                            <table>
                                <tbody>
                                    <tr>
                                        <td style="font-weight: 700;">Customer</td>
                                        <td style="padding: 0 5px;">:</td>
                                        <td>{{ $transaksi->konsumen->nama }}</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td style="padding: 0 5px;">:</td>
                                        <td>{{ $transaksi->konsumen->alamat }}</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td style="padding: 0 5px;">:</td>
                                        <td>{{ $transaksi->konsumen->no_hp }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                        <td style="width: 30%;">
                            <table style="width: 100%;">
                                <tbody>
                                    <tr>
                                        <td style="font-weight: 700;">Kode Transaksi</td>
                                        <td style="padding: 0 5px;">:</td>
                                        <td>{{ $transaksi->kode }}</td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight: 700;">Tanggal Masuk</td>
                                        <td style="padding: 0 5px;">:</td>
                                        <td>{{ \Carbon\Carbon::parse($transaksi->tanggal_masuk)->translatedFormat('d F Y') }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight: 700;">Tanggal Ambil</td>
                                        <td style="padding: 0 5px;">:</td>
                                        <td>{{ \Carbon\Carbon::parse($transaksi->tanggal_ambil)->translatedFormat('d F Y') }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
            <table style="border: 2px solid black; width: 100%; border-collapse: collapse; margin-top: 20px;">
                <thead>
                    <tr style="border: 2px solid black;">
                        <th style="border: 2px solid black; text-align: center; padding: 10px;">Paket Londri</th>
                        <th style="border: 2px solid black; text-align: center; padding: 10px;">Berat (KG)</th>
                        <th style="border: 2px solid black; text-align: center; padding: 10px;">Harga</th>
                        <th style="border: 2px solid black; text-align: center; padding: 10px;">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <tr style="border: 2px solid black;">
                        <td style="border: 2px solid black; padding: 10px;">{{ $transaksi->paket->nama }}</td>
                        <td style="border: 2px solid black; padding: 10px;">{{ $transaksi->berat }}</td>
                        <td style="border: 2px solid black; padding: 10px;">
                            {{ \App\Helpers\Helper::formatRupiah($transaksi->paket->harga, true) }}
                        </td>
                        <td style="border: 2px solid black; padding: 10px;">
                            {{ \App\Helpers\Helper::formatRupiah($transaksi->paket->harga * $transaksi->berat, true) }}
                        </td>
                    </tr>
                    <tr style="border: 2px solid black;">
                        <td style="border: 2px solid black; text-align: right; padding: 10px; font-weight: 700;"
                            colspan="3">Total</td>
                        <td style="border: 2px solid black; padding: 10px;">
                            {{ \App\Helpers\Helper::formatRupiah($transaksi->paket->harga * $transaksi->berat, true) }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <h6 style="font-weight: 700; margin-top: 2rem;">Keterangan</h6>
            <ol>
                <li>Pengambilan cucian harus membawa nota</li>
                <li>Cuci luntuk bukan tanggung jawab kami</li>
                <li>Hitung dan periksa sebelum pergi</li>
                <li>Klaim kekurangan/kehilangan cucian setelah meninggalkan laundry tidak dilayani</li>
            </ol>
        </div>
    </div>
@endsection

@push('css')
    <link type="text/css" href="{{ asset('assets/admin/vendor/sweetalert2/dist/sweetalert2.min.css') }}" rel="stylesheet">
@endpush

@push('js')
    <script src="{{ asset('assets/admin/vendor/sweetalert2/dist/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/konsumen/index.js') }}"></script>
@endpush
