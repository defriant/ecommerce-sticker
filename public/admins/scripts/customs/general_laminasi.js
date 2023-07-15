function getLaminasi() {
    ajaxRequest.get({ url: '/admin/custom/general/laminasi' }).then((res) => {
        $('#loader-laminasi').hide();
        if (res.length === 0) {
            $('#table-laminasi').hide();
            $('#null-data-laminasi').show();
        } else {
            $('#data-laminasi').html(
                res
                    .map(
                        (v) => `
                <tr>
                    <td>${v.nama}</td>
                    <td>Rp. ${v.harga}</td>
                    <td style="text-align: right">
                        <button
                            class="btn-table-action edit update-laminasi"
                            data-id="${v.id}"
                            data-nama="${v.nama}"
                            data-harga="${v.harga}"
                        >
                            <i class="fas fa-pen"></i>
                        </button>
                        &nbsp;
                        <button
                            class="btn-table-action delete delete-laminasi"
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

            $('#table-laminasi').show();
            $('#null-data-laminasi').hide();

            $('.update-laminasi').on('click', function () {
                const data = {
                    id: $(this).data('id'),
                    nama: $(this).data('nama'),
                    harga: $(this).data('harga'),
                };

                $('#update-id-laminasi').val(data.id);
                $('#update-nama_laminasi').val(data.nama);
                $('#update-harga_laminasi').val(data.harga);
                $('#modal-update-laminasi').modal('show');
            });

            $('.delete-laminasi').on('click', function () {
                const data = {
                    id: $(this).data('id'),
                    nama: $(this).data('nama'),
                };

                $('#delete-id-laminasi').val(data.id);
                $('#delete-laminasi-warning-message').html(`Hapus data ${data.nama} ?`);
                $('#modal-delete-laminasi').modal('show');
            });
        }
    });
}

getLaminasi();

$('#submit-add-laminasi').on('click', function () {
    let params = {
        nama: $('#add-nama_laminasi').val(),
        harga: $('#add-harga_laminasi').val(),
    };

    if (!params.nama) return alert('Masukan nama barang');
    if (!params.harga) return alert('Masukan harga barang');

    $('#submit-add-laminasi').attr('disabled', true);
    ajaxRequest
        .post({
            url: '/admin/custom/general/laminasi/add',
            data: params,
        })
        .then((res) => {
            $('#modal-add-laminasi').modal('hide');
            $('#submit-add-laminasi').removeAttr('disabled');
            toastSuccess(res.message);
            getLaminasi();
        });
});

$('#submit-update-laminasi').on('click', function () {
    if (!$('#update-id-laminasi').val()) return;

    let params = {
        id: $('#update-id-laminasi').val(),
        nama: $('#update-nama_laminasi').val(),
        harga: $('#update-harga_laminasi').val(),
    };

    if (!params.nama) return alert('Masukan nama laminasi');
    if (!params.harga) return alert('Masukan harga laminasi');

    $('#submit-update-laminasi').attr('disabled', true);
    ajaxRequest
        .post({
            url: '/admin/custom/general/laminasi/update/' + $('#update-id-laminasi').val(),
            data: params,
        })
        .then((res) => {
            $('#modal-update-laminasi').modal('hide');
            $('#submit-update-laminasi').removeAttr('disabled');
            toastSuccess(res);
            getLaminasi();
        });
});

$('#btn-delete-laminasi').on('click', function () {
    if (!$('#delete-id-laminasi')) return;

    $(this).attr('disabled', true);
    ajaxRequest
        .post({
            url: '/admin/custom/general/laminasi/delete',
            data: {
                id: $('#delete-id-laminasi').val(),
            },
        })
        .then((res) => {
            toastSuccess(res);
            $('#modal-delete-laminasi').modal('hide');
            getLaminasi();
        });
});

$('#modal-add-laminasi').on('hide.bs.modal', function () {
    setTimeout(() => {
        $('#add-nama_laminasi').val('');
        $('#add-harga_laminasi').val('');
    }, 300);
});

$('#modal-update-laminasi').on('hide.bs.modal', function () {
    setTimeout(() => {
        $('#update-nama_laminasi').val('');
        $('#update-harga_laminasi').val('');
    }, 300);
});

$('#modal-delete-laminasi').on('hide.bs.modal', function () {
    setTimeout(() => {
        $('#btn-delete-laminasi').removeAttr('disabled');
        $('#delete-id-laminasi').val('');
        $('#delete-laminasi-warning-message').empty();
    }, 300);
});
