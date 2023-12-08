"use strict"

$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.state').select2({
        dropdownParent: $('.konsumen'),
    });
    $('select[name="status"]').select2({
        dropdownParent: $('.status'),
    });
    $('#range').daterangepicker({
        autoApply: true,
        ranges: {
            'This Periode': [moment().subtract(1, 'months').date(21), moment().date(20)],
            'Previous Periode': [moment().subtract(2, 'months').date(21), moment().subtract(1,
                'months').date(20)],
            'Next Periode': [moment().date(21), moment().date(20).add(1, 'M')],
        }
    });
    const datatable = $('#datatable').DataTable({
        processing: true,
        scrollX: true,
        scrollCollapse: true,
        order: [
            [0, 'asc']
        ],
        ajax: {
            type: "POST",
            url: "/laporan/datatable",
            data: function (data) {
                data.range = $('input[name="range"]').val();
                data.konsumen_id = $('select[name="konsumen_id"]').val();
                data.status = $('select[name="status"]').val();
            }
        },
        columns: [{
            name: 'tanggal_masuk',
            data: 'tanggal_masuk',
        },
        {
            name: 'kode',
            data: 'kode',
        },
        {
            name: 'konsumen',
            data: 'konsumen',
        },
        {
            name: 'paket',
            data: 'paket',
        },
        {
            name: 'berat',
            data: 'berat',
        },
        {
            name: 'grand_total',
            data: 'grand_total',
        },
        {
            name: 'tanggal_ambil',
            data: 'tanggal_ambil',
        },
        {
            name: 'status',
            data: 'status',
        },
        ],
    });
    $('input[name="range"]').change(function (e) {
        e.preventDefault();
        datatable.ajax.reload();
    });
    $('select[name="konsumen_id"]').change(function (e) {
        e.preventDefault();
        datatable.ajax.reload();
    });
    $('select[name="status"]').change(function (e) {
        e.preventDefault();
        datatable.ajax.reload();
    });
});
