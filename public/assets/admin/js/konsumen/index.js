"use strict"
document.addEventListener("DOMContentLoaded", function (event) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    const datatable = $('#datatable').DataTable({
        processing: true,
        order: [
            [0, 'asc']
        ],
        ajax: {
            type: "POST",
            url: "/konsumen/datatable",
        },
        columns: [{
            name: 'kode',
            data: 'kode',
        },
        {
            name: 'nama',
            data: 'nama',
        },
        {
            name: 'alamat',
            data: 'alamat',
        },
        {
            name: 'no_hp',
            data: 'no_hp',
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
                    url: `/konsumen/${key}/destroy`,
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
        $(this).attr('data-progress', 'on');
        $.ajax({
            type: "GET",
            url: "/konsumen/next-kode",
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
            url: `/konsumen/${key}/edit`,
            dataType: "JSON",
            success: function (response) {
                $(target).removeAttr('data-progress');
                $('#form input[name="kode"]').val(response.kode);
                $('#form input[name="nama"]').val(response.nama);
                $('#form textarea[name="alamat"]').val(response.alamat);
                $('#form input[name="no_hp"]').val(response.no_hp);
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

    $('#modal-form').on('click', '#btn-save', function () {
        var postData = new FormData($(`#form`)[0]);
        var target = this;
        $(this).attr('data-progress', 'on');
        $.ajax({
            type: 'POST',
            url: "/konsumen/store",
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
                    $('#form input[name="key"]').val('');
                    $('#form input[name="kode"]').val('');
                    $('#form input[name="nama"]').val('');
                    $('#form textarea[name="alamat"]').val('');
                    $('#form input[name="no_hp"]').val('');
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
});
