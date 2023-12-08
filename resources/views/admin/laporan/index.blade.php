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
            <li class="breadcrumb-item active" aria-current="page">Data Laporan</li>
        </ol>
    </nav>
@endsection

@section('content')
    <div class="card" style="overflow: hidden !important;">
        <div class="card-header">
            <form action="{{ route('laporan.print-pdf') }}" target="_blank">
                <div class="row align-items-end">
                    <div class="col-md-3">
                        <div class="form-group mb-2 ">
                            <label for="range">Pariode</label>
                            <input type="text" class="form-control" name="range" id="range">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group mb-2 konsumen">
                            <label for="konsumen_id">Konsumen</label>
                            <select class="form-select state" name="konsumen_id" id="konsumen_id">
                                <option value="">- all -</option>
                                @foreach ($konsumens as $konsumen)
                                    <option value="{{ $konsumen->id }}">{{ $konsumen->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group mb-2 status">
                            <label for="status">Status</label>
                            <select class="form-select" name="status" id="status">
                                <option value="">- all -</option>
                                @foreach (\App\Enums\Status::cases() as $status)
                                    <option value="{{ $status->value }}">
                                        {{ $status->label() }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3 pb-2">
                        <button type="submit" class="btn btn-info">
                            <div class="d-flex align-items-center gap-2">
                                <svg class="icon icon-xs" fill="none" stroke="currentColor" stroke-width="1.5"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z">
                                    </path>
                                </svg>
                                <span>Print PDF</span>
                            </div>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-flush w-100" id="datatable">
                <thead class="thead-light">
                    <tr>
                        <th>Tanggal Masuk</th>
                        <th>Kode Transaksi</th>
                        <th>Konsumen</th>
                        <th>Paket</th>
                        <th>Berat (KG)</th>
                        <th>Grand Total</th>
                        <th>Tanggal Ambil</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/admin/vendor/DataTables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/vendor/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/vendor/daterangepicker/daterangepicker.css') }}">
@endpush

@push('js')
    <script src="{{ asset('assets/admin/vendor/DataTables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/daterangepicker/moment.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('assets/admin/js/laporan/index.js') }}"></script>
@endpush
