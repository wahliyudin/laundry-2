"use strict"
document.addEventListener("DOMContentLoaded", function (event) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.uang').mask('0.000.000.000', {
        reverse: true
    });
    $('.state').select2({
        dropdownParent: $('#modal-form'),
    });
    $('select[name="status"]').select2({
        dropdownParent: $('#modal-form-status'),
    });
    $('select[name="status_bayar"]').select2({
        dropdownParent: $('#modal-form-bayar'),
    });
    $('select[name="paket_id"]').on('change', function () {
        var selected = $(this).find(':selected');
        var harga = $(selected).data('harga');
        $('input[name="harga"]').val(harga).trigger('input');
    });
    $('input[name="berat"]').keyup(function (e) {
        var value = $(this).val();
        var selected = $('select[name="paket_id"]').find(':selected');
        var harga = $(selected).data('harga');
        var total = value * harga;
        $('input[name="total"]').val(total).trigger('input');
    });
    var datepickers = [].slice.call(d.querySelectorAll('[data-datepicker]'))
    var datepickersList = datepickers.map(function (el) {
        return new Datepicker(el, {
            buttonClass: 'btn'
        });
    })
    const datatable = $('#datatable').DataTable({
        processing: true,
        scrollX: true,
        scrollCollapse: true,
        order: [
            [0, 'asc']
        ],
        ajax: {
            type: "POST",
            url: "/transaksi/datatable",
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
        {
            name: 'action',
            data: 'action',
        },
        ],
    });

    $('#datatable').on('click', '#btn-delete', function () {
        var key = $(this).data('key');
        var target = this;
        $(target).attr('data-progress', 'on');
        Swal.fire({
            text: "Are you sure you want to delete ?",
            icon: "warning",
            showCancelButton: true,
            buttonsStyling: false,
            confirmButtonText: "Yes, delete!",
            cancelButtonText: "No, cancel",
            customClass: {
                confirmButton: "btn fw-bold btn-danger",
                cancelButton: "btn fw-bold btn-active-light-primary"
            }
        }).then(function (result) {
            if (result.value) {
                $.ajax({
                    type: "DELETE",
                    url: `/transaksi/${key}/destroy`,
                    dataType: "JSON",
                    success: function (response) {
                        $(target).removeAttr('data-progress');
                        Swal.fire({
                            text: "You have deleted !.",
                            icon: "success",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn fw-bold btn-primary",
                            }
                        }).then(function () {
                            datatable.ajax.reload();
                        });
                    },
                    error: function (jqXHR, xhr, textStatus, errorThrow, exception) {
                        $(target).removeAttr('data-progress');
                        if (jqXHR.status == 422) {
                            Swal.fire({
                                icon: 'warning',
                                title: 'Peringatan!',
                                text: JSON.parse(jqXHR.responseText)
                                    .message,
                            })
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                text: jqXHR.responseText,
                            })
                        }
                    }
                });
            } else if (result.dismiss === 'cancel') {
                $(target).removeAttr('data-progress');
                Swal.fire({
                    text: "was not deleted.",
                    icon: "error",
                    buttonsStyling: false,
                    confirmButtonText: "Ok, got it!",
                    customClass: {
                        confirmButton: "btn fw-bold btn-primary",
                    }
                });
            }
        });
    });

    $('#btn-add').click(function (e) {
        e.preventDefault();
        var target = this;
        resetForm();
        $(this).attr('data-progress', 'on');
        $.ajax({
            type: "GET",
            url: "/transaksi/next-kode",
            dataType: "JSON",
            success: function (response) {
                $(target).removeAttr('data-progress');
                $('input[name="kode"]').val(response);
                $('#modal-form').modal('show');
            },
            error: function (jqXHR, xhr, textStatus, errorThrow, exception) {
                $(target).removeAttr('data-progress');
                if (jqXHR.status == 422) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Peringatan!',
                        text: JSON.parse(jqXHR.responseText)
                            .message,
                    })
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: jqXHR.responseText,
                    })
                }
            }
        });
    });

    $('#datatable').on('click', '#btn-edit', function () {
        var key = $(this).data('key');
        $('#form input[name="key"]').val(key);
        var target = this;
        $(this).attr('data-progress', 'on');
        $.ajax({
            type: "POST",
            url: `/transaksi/${key}/edit`,
            dataType: "JSON",
            success: function (response) {
                $(target).removeAttr('data-progress');
                $('#form input[name="kode"]').val(response.kode);
                $('#form input[name="tanggal_masuk"]').val(response.tanggal_masuk);
                $('#form select[name="konsumen_id"]').val(response.konsumen_id).trigger('change');
                $('#form select[name="paket_id"]').val(response.paket_id).trigger('change');
                $('#form input[name="harga"]').val(response.harga).trigger('input');
                $('#form input[name="berat"]').val(response.berat);
                $('#form input[name="total"]').val(response.total).trigger('input');
                $('#modal-form').modal('show');
            },
            error: function (jqXHR, xhr, textStatus, errorThrow, exception) {
                $(target).removeAttr('data-progress');
                if (jqXHR.status == 422) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Peringatan!',
                        text: JSON.parse(jqXHR.responseText)
                            .message,
                    })
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: jqXHR.responseText,
                    })
                }
            }
        });
    });

    function resetForm() {
        $('#form input[name="key"]').val('');
        $('#form input[name="kode"]').val('');
        $('#form input[name="tanggal_masuk"]').val('');
        $('#form select[name="konsumen_id"]').val('').trigger('change');
        $('#form select[name="paket_id"]').val('').trigger('change');
        $('#form input[name="harga"]').val('');
        $('#form input[name="berat"]').val('');
        $('#form input[name="total"]').val('');
    }

    $('#modal-form').on('click', '#btn-save', function () {
        var postData = new FormData($(`#form`)[0]);
        var target = this;
        $(this).attr('data-progress', 'on');
        $.ajax({
            type: 'POST',
            url: "/transaksi/store",
            processData: false,
            contentType: false,
            data: postData,
            success: function (response) {
                Swal.fire({
                    text: response.message,
                    icon: "success",
                    buttonsStyling: false,
                    confirmButtonText: "Ok, got it!",
                    customClass: {
                        confirmButton: "btn fw-bold btn-primary",
                    }
                }).then(function () {
                    resetForm();
                    $('#modal-form').modal('hide');
                    datatable.ajax.reload();
                });
                $(target).removeAttr('data-progress');
            },
            error: function (jqXHR, xhr, textStatus, errorThrow, exception) {
                $(target).removeAttr('data-progress');
                if (jqXHR.status == 422) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Peringatan!',
                        text: JSON.parse(jqXHR.responseText)
                            .message,
                    })
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: jqXHR.responseText,
                    })
                }
            }
        });
    });

    $('#datatable').on('click', '#btn-edit-status', function () {
        var key = $(this).data('key');
        $('#modal-form-status input[name="key"]').val(key);
        $('#modal-form-status').modal('show');
    });

    $('#modal-form-status').on('click', '#btn-save', function () {
        var postData = new FormData($(`#form-status`)[0]);
        var target = this;
        $(this).attr('data-progress', 'on');
        $.ajax({
            type: 'POST',
            url: "/transaksi/update-status",
            processData: false,
            contentType: false,
            data: postData,
            success: function (response) {
                Swal.fire({
                    text: response.message,
                    icon: "success",
                    buttonsStyling: false,
                    confirmButtonText: "Ok, got it!",
                    customClass: {
                        confirmButton: "btn fw-bold btn-primary",
                    }
                }).then(function () {
                    $('#modal-form-status').modal('hide');
                    datatable.ajax.reload();
                });
                $(target).removeAttr('data-progress');
            },
            error: function (jqXHR, xhr, textStatus, errorThrow, exception) {
                $(target).removeAttr('data-progress');
                if (jqXHR.status == 422) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Peringatan!',
                        text: JSON.parse(jqXHR.responseText)
                            .message,
                    })
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: jqXHR.responseText,
                    })
                }
            }
        });
    });

    $('#datatable').on('click', '#btn-bayar', function () {
        var key = $(this).data('key');
        $('#modal-form-bayar input[name="key"]').val(key);
        $('#modal-form-bayar').modal('show');
    });

    $('#modal-form-bayar').on('click', '#btn-save', function () {
        var postData = new FormData($(`#form-bayar`)[0]);
        var target = this;
        $(this).attr('data-progress', 'on');
        $.ajax({
            type: 'POST',
            url: "/transaksi/bayar",
            processData: false,
            contentType: false,
            data: postData,
            success: function (response) {
                Swal.fire({
                    text: response.message,
                    icon: "success",
                    buttonsStyling: false,
                    confirmButtonText: "Ok, got it!",
                    customClass: {
                        confirmButton: "btn fw-bold btn-primary",
                    }
                }).then(function () {
                    $('#modal-form-bayar').modal('hide');
                    datatable.ajax.reload();
                });
                $(target).removeAttr('data-progress');
            },
            error: function (jqXHR, xhr, textStatus, errorThrow, exception) {
                $(target).removeAttr('data-progress');
                if (jqXHR.status == 422) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Peringatan!',
                        text: JSON.parse(jqXHR.responseText)
                            .message,
                    })
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: jqXHR.responseText,
                    })
                }
            }
        });
    });
});
