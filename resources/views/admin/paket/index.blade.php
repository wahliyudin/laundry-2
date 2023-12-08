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
            <li class="breadcrumb-item active" aria-current="page">Data Paket</li>
        </ol>
    </nav>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center justify-content-end">
                <button class="btn btn-primary" type="button" id="btn-add">
                    <span class="indicator-label">
                        <div class="d-flex align-items-center gap-2">
                            <svg class="icon icon-xs" fill="none" stroke="currentColor" stroke-width="1.5"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"></path>
                            </svg>
                            <span>Tambah Paket</span>
                        </div>
                    </span>
                    <span class="indicator-progress">
                        <div class="d-flex align-items-center">
                            <span class="ms-1">Loading...</span>
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        </div>
                    </span>
                </button>
            </div>
        </div>
        <div class="card-body" style="overflow-x: auto;">
            <table class="table table-flush" id="datatable">
                <thead class="thead-light">
                    <tr>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('modal')
    <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="h6 modal-title">Tambah Paket</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" id="form">
                        <input type="hidden" name="key">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group mb-2">
                                    <label for="kode">Kode</label>
                                    <input type="text" class="form-control" name="kode" id="kode" readonly>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-2">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control" name="nama" id="nama">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-2">
                                    <label for="harga">Harga</label>
                                    <input type="text" class="form-control uang" name="harga" id="harga">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link text-gray-600 ms-auto" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-secondary" type="button" id="btn-save">
                        <span class="indicator-label">
                            <div class="d-flex align-items-center gap-2">
                                <svg class="icon icon-xs" fill="none" stroke="currentColor" stroke-width="1.5"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M16.5 3.75V16.5L12 14.25 7.5 16.5V3.75m9 0H18A2.25 2.25 0 0120.25 6v12A2.25 2.25 0 0118 20.25H6A2.25 2.25 0 013.75 18V6A2.25 2.25 0 016 3.75h1.5m9 0h-9">
                                    </path>
                                </svg>
                                <span>Simpan</span>
                            </div>
                        </span>
                        <span class="indicator-progress">
                            <div class="d-flex align-items-center">
                                <span class="ms-1">Loading...</span>
                                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            </div>
                        </span>
                    </button>
                </div>
            </div>
        </div>
    </div>
@endpush

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/admin/vendor/DataTables/datatables.min.css') }}">
    <link type="text/css" href="{{ asset('assets/admin/vendor/sweetalert2/dist/sweetalert2.min.css') }}"
        rel="stylesheet">
@endpush

@push('js')
    <script src="{{ asset('assets/admin/vendor/DataTables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/sweetalert2/dist/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/simple-datatables/dist/umd/simple-datatables.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/mask/jquery.mask.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/paket/index.js') }}"></script>
@endpush
