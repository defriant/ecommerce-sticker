function getBahan() {
    ajaxRequest.get({ url: '/admin/custom/general/bahan' }).then((res) => {
        $('#loader-bahan').hide();
        if (res.length === 0) {
            $('#table-bahan').hide();
            $('#null-data-bahan').show();
        } else {
            $('#data-bahan').html(
                res
                    .map(
                        (v) => `
                <tr>
                    <td>${v.nama}</td>
                    <td>Rp. ${v.harga}</td>
                    <td style="text-align: right">
                        <button
                            class="btn-table-action edit update-bahan"
                            data-id="${v.id}"
                            data-nama="${v.nama}"
                            data-harga="${v.harga}"
                        >
                            <i class="fas fa-pen"></i>
                        </button>
                        &nbsp;
                        <button
                            class="btn-table-action delete delete-bahan"
                            data-id="${v.id}"
                            data-nama="${v.nama}"
                        >
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </td>
                </tr>`
                    )
                    .join('')
            );

            $('#table-bahan').show();
            $('#null-data-bahan').hide();

            $('.update-bahan').on('click', function () {
                const data = {
                    id: $(this).data('id'),
                    nama: $(this).data('nama'),
                    harga: $(this).data('harga'),
                };

                $('#update-id-bahan').val(data.id);
                $('#update-nama_bahan').val(data.nama);
                $('#update-harga_bahan').val(data.harga);
                $('#modal-update-bahan').modal('show');
            });

            $('.delete-bahan').on('click', function () {
                const data = {
                    id: $(this).data('id'),
                    nama: $(this).data('nama'),
                };

                $('#delete-id-bahan').val(data.id);
                $('#delete-bahan-warning-message').html(
                    `Hapus data ${data.nama} ?`
                );
                $('#modal-delete-bahan').modal('show');
            });
        }
    });
}

getBahan();

$('#submit-add-bahan').on('click', function () {
    let params = {
        nama: $('#add-nama_bahan').val(),
        harga: $('#add-harga_bahan').val(),
    };

    if (!params.nama) return alert('Masukan nama barang');
    if (!params.harga) return alert('Masukan harga barang');

    $('#submit-add-bahan').attr('disabled', true);
    ajaxRequest
        .post({
            url: '/admin/custom/general/bahan/add',
            data: params,
        })
        .then((res) => {
            $('#modal-add-bahan').modal('hide');
            $('#submit-add-bahan').removeAttr('disabled');
            toastSuccess(res.message);
            getBahan();
        });
});

$('#submit-update-bahan').on('click', function () {
    if (!$('#update-id-bahan').val()) return;

    let params = {
        id: $('#update-id-bahan').val(),
        nama: $('#update-nama_bahan').val(),
        harga: $('#update-harga_bahan').val(),
    };

    if (!params.nama) return alert('Masukan nama barang');
    if (!params.harga) return alert('Masukan harga barang');

    $('#submit-update-bahan').attr('disabled', true);
    ajaxRequest
        .post({
            url:
                '/admin/custom/general/bahan/update/' +
                $('#update-id-bahan').val(),
            data: params,
        })
        .then((res) => {
            $('#modal-update-bahan').modal('hide');
            $('#submit-update-bahan').removeAttr('disabled');
            toastSuccess(res);
            getBahan();
        });
});

$('#btn-delete-bahan').on('click', function () {
    if (!$('#delete-id-bahan')) return;

    $(this).attr('disabled', true);
    ajaxRequest
        .post({
            url: '/admin/custom/general/bahan/delete',
            data: {
                id: $('#delete-id-bahan').val(),
            },
        })
        .then((res) => {
            toastSuccess(res);
            $('#modal-delete-bahan').modal('hide');
            getBahan();
        });
});

$('#modal-add-bahan').on('hide.bs.modal', function () {
    setTimeout(() => {
        $('#add-nama_bahan').val('');
        $('#add-harga_bahan').val('');
    }, 300);
});

$('#modal-update-bahan').on('hide.bs.modal', function () {
    setTimeout(() => {
        $('#update-nama_bahan').val('');
        $('#update-harga_bahan').val('');
    }, 300);
});

$('#modal-delete-bahan').on('hide.bs.modal', function () {
    setTimeout(() => {
        $('#btn-delete-bahan').removeAttr('disabled');
        $('#delete-id-bahan').val('');
        $('#delete-bahan-warning-message').empty();
    }, 300);
});
