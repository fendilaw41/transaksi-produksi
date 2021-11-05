function getFetchPlanning() {
    $.ajax({
        url: "/planning/index",
        type: "GET",
        dataType: "JSON",
        beforeSend: function () {
            $("#t_planning tbody").html(`
            <tr>
                <td colspan="5" class="text-center">
                <div class="spinner-border spinner-border-lg text-primary" role="status">
                </div>
                </td >
            </tr>
            `);
        },
        success: function (res) {
            // console.log(res.results);
            if (res.results.length === 0) {
                $("#t_planning tbody").html(
                    `  <tr>
                    <td colspan="5" class="text-center">
                        Data Kosong
                    </td>
                    </tr>`
                );
            } else {
                let data = res.results
                    .map((v, i) => {
                        return `
                    <tr>
                    <td>${i + 1}</td>
                    <td>${v.item.nama_item}</td>
                    <td>${v.qty}</td>
                    <td>${v.waktu_target}</td>
                    <td>${v.created_at}</td>
                    <td>
                    <div class="dropdown">
                    <span class=" bx bx-dots-vertical-rounded  font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="menu">
                    </span>
                    <div class="dropdown-menu dropdown-menu-right">
                      <a class="dropdown-item btn_edit" data-id="${v.id}"><i class="bx bx-edit-alt mr-1"></i> edit</a>
                      <a class="dropdown-item btn_hapus" data-id="${v.id}"><i class="bx bx-trash mr-1"></i> delete</a>
                    </div>
                  </div>
                     </td>
                    </tr>`;
                    })
                    .join("");
                $("#t_planning tbody").html(data);
            }
        },
        error: function (err) {
            $("#t_planning tbody").html(
                ` <tr>
                <td colspan="5" class="text-center">
                <h4 class="text-danger">Internal Server Error!</h4>
                </td>
            </tr>`
            );
        },
    });
}


toastr.options = {
    "closeButton": false,
    "debug": false,
    "newestOnTop": false,
    "progressBar": false,
    "positionClass": "toast-bottom-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
}

$(function () {
    getFetchPlanning();
    $('#btn_add').on('click', function () {
        $('#modal_add').modal('show')
    })
    $('#form_add').validate({
        submitHandler: function (form) {
            $.ajax({
                url: '/planning/store',
                type: 'POST',
                data: $(form).serialize(),
                beforeSend: function () {
                    $('#btn_save').prop('disabled', true).html('<div class="spinner-border text-dark" role="status">')
                },
                success: function (res) {
                    // console.log(res);
                    getFetchPlanning();
                    toastr.success(res.message, 'Sukses')
                    $('#modal_add').modal('hide');
                },
                error: function(err) {
                    toastr.error(err.responseJSON.message, 'Failed')
                },
                complete: function() {
                    $('#btn_save').prop('disabled', false).html('Tambah')
                    $('#form_add').trigger("reset")
                }
            })
        }
    })
    $('#t_planning').on('click', '.btn_edit', function () {
        let id = $(this).data('id')
        let button = $(this)
        console.log(id);
        $.ajax({
            url: `/planning/show/${id}`,
            type: 'GET',
            dataType: 'JSON',
            beforeSend: function () {
                button.html('<div class="spinner-border" role="status">')
            },
            success: function (res) {
                $('#item_id').val(res.result.item_id)
                $('#edit_qty').val(res.result.qty)
                $('#edit_waktu_target').val(res.result.waktu_target)
                $('#edit_id').val(res.result.id)
                $('#modal_edit').modal('show')
            },
            complete: function () {
                button.html('<i class="bx bx-edit-alt mr-1"></i>Edit').prop('disabled', false)
            },
            error: function (err) {
                toastr.error(err.responseJSON.message, 'GAGAL')
            }
        })
    })
    $('#form_edit').validate({
        submitHandler: function (form) {
            let id = $('#edit_id').val()
            $.ajax({
                url: `/planning/update/${id}`,
                type: 'POST',
                data: $(form).serialize(),
                beforeSend: function () {
                    $('#btn_update').prop('disabled', true).html('<div class="spinner-border text-dark" role="status">')
                },
                success: function (res) {
                    getFetchPlanning();
                    toastr.success(res.message, 'Sukses')
                    $('#modal_edit').modal('hide');
                },
                error: function(err) {
                    toastr.error(err.responseJSON.message, 'Failed')
                },
                complete: function() {
                    $('#btn_update').prop('disabled', false).html('Update')
                    $('#form_add').trigger("reset")
                }
            })
        }
    })
    $('#t_planning').on('click', '.btn_hapus', function () {
        let id = $(this).data('id')
        console.log(id);
        $.ajax({
            url: `/planning/show/${id}`,
            type: 'GET',
            dataType: 'JSON',
            success: function (res) {
                $('#delete_id').val(res.result.id)
                swal({
                    title: 'Anda yakin Hapus?',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#8e24aa',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Hapus? !',
                    cancelButtonText: 'No, batalkan!',
                    confirmButtonClass: 'btn btn-success',
                    cancelButtonClass: 'btn btn-danger',
                    buttonsStyling: false,
                    reverseButtons: true
                }).then((result) => {
                    if (result.value) {
                        event.preventDefault();
                        $("#form_delete").submit()
                    } else if (
                        // Read more about handling dismissals
                        result.dismiss === swal.DismissReason.cancel
                    ) {
                        swal(
                            'Cancelled',
                            'Dibatalkan :)',
                            'info'
                        )
                    }
                })
            },
            error: function (err) {
                toastr.error(err.responseJSON.message, 'GAGAL')
            }
        })
    })
    $('#form_delete').validate({
        submitHandler: function (form) {
            let id = $('#delete_id').val()
            $.ajax({
                url: `/planning/delete/${id}`,
                type: 'POST',
                data: $(form).serialize(),
                success: function (res) {
                    getFetchPlanning();
                    toastr.success(res.message, 'Sukses')
                },
                error: function(err) {
                    toastr.error(err.responseJSON.message, 'Failed')
                },

            })
        }
    })
});

$('#item_id').select2({
   dropdownParent: $('#modal_add'),
   width: '100%',
    placeholder: '--Pilih Item--'
    , ajax: {
        url: '/resource/item'
        , dataType: "JSON"
        , type: "GET"
        , data: function(params) {
            let query = {
                search: params.term
                , page: params.page || 1
            , }
            return query
        }
        , processResults: function(res) {
            let filtered = []
            res.results.data.map(v => {
                let obj = {
                    id: v.id
                    , text: `${v.kode} - ${v.nama_item}`
                }
                filtered.push(obj)
            })
            return {
                results: filtered
                , pagination: {
                    more: res.results.current_page !== res.results.last_page
                }
            }
        }
        , cache: true
    }
})

$('#edit_item_id').select2({
   dropdownParent: $('#modal_edit'),
   width: '100%',
    placeholder: '--Pilih Item--'
    , ajax: {
        url: '/resource/item'
        , dataType: "JSON"
        , type: "GET"
        , data: function(params) {
            let query = {
                search: params.term
                , page: params.page || 1
            , }
            return query
        }
        , processResults: function(res) {
            let filtered = []
            res.results.data.map(v => {
                let obj = {
                    id: v.id
                    , text: `${v.kode} - ${v.nama_item}`
                }
                filtered.push(obj)
            })
            return {
                results: filtered
                , pagination: {
                    more: res.results.current_page !== res.results.last_page
                }
            }
        }
        , cache: true
    }
})