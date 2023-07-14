function initiateTipe({ tipe = '', nama = '' }) {
    if (!tipe || !nama)
        return console.error('initiateTipe params tipe and nama is required');

    function getTipe(selected = null) {
        ajaxRequest.get({ url: `/admin/custom/${tipe}/tipe` }).then((res) => {
            let selectTipeEl = `<option value="" disabled${
                selected ? '' : ' selected'
            }>-- Pilih tipe ${nama} --</option>`;
            if (res.length > 0) {
                selectTipeEl += `${res
                    .map(
                        (v) =>
                            `<option value="${v.id}"${
                                v.id === selected ? ' selected' : ''
                            }>${v.nama}</option>`
                    )
                    .join('')}
                    `;
            }
            $(`#select-tipe-${nama}`).html(selectTipeEl);
            $(`#select-tipe-${nama}`).trigger('change');
        });
    }

    getTipe();

    $(`#submit-add-${nama}`).on('click', function () {
        if (!$(`#add-tipe_${nama}`).val()) return alert('Masukkan nama tipe');

        $(this).attr('disabled', true);
        ajaxRequest
            .post({
                url: `/admin/custom/${tipe}/tipe/add`,
                data: {
                    nama: $(`#add-tipe_${nama}`).val(),
                },
            })
            .then((res) => {
                toastSuccess(res.message);
                getTipe(res.data.id);
                $(`#modal-add-${nama}`).modal('hide');
            });
    });

    $(`#modal-add-${nama}`).on('hide.bs.modal', function () {
        setTimeout(() => {
            $(`#add-tipe_${nama}`).val('');
            $(`#submit-add-${nama}`).removeAttr('disabled');
        }, 300);
    });

    $(`#submit-update-${nama}`).on('click', function () {
        console.log('update');
        if (!$(`#update-id-${nama}`).val()) return;
        if (!$(`#update-tipe_${nama}`).val())
            return alert('Masukkan nama tipe');

        $(this).attr('disabled', true);
        ajaxRequest
            .post({
                url: `/admin/custom/${tipe}/tipe/update`,
                data: {
                    id: $(`#update-id-${nama}`).val(),
                    nama: $(`#update-tipe_${nama}`).val(),
                },
            })
            .then((res) => {
                toastSuccess(res.message);
                getTipe(res.data.id);
                $(`#modal-update-${nama}`).modal('hide');
            });
    });

    $(`#modal-update-${nama}`).on('hide.bs.modal', function () {
        setTimeout(() => {
            $(`#submit-update-${nama}`).removeAttr('disabled');
        }, 300);
    });

    $(`#btn-delete-${nama}`).on('click', function () {
        if (!$(`#delete-id-${nama}`).val()) return;

        $(this).attr('disabled', true);
        ajaxRequest
            .post({
                url: `/admin/custom/${tipe}/tipe/delete`,
                data: {
                    id: $(`#delete-id-${nama}`).val(),
                },
            })
            .then((res) => {
                toastSuccess(res);
                getTipe();
                $(`#modal-delete-${nama}`).modal('hide');
            });
    });

    $(`#modal-delete-${nama}`).on('hide.bs.modal', function () {
        setTimeout(() => {
            $(`#btn-delete-${nama}`).removeAttr('disabled');
        }, 300);
    });

    $(`#select-tipe-${nama}`).on('change', function () {
        if ($(this).val() !== null) {
            const id = $(this).val();
            const value = $(this).find(':selected').html();

            $('#btn-action-tipe').css('visibility', 'visible');
            $('.tipe-nama').html(value);

            $(`#update-id-${nama}`).val(id);
            $(`#update-tipe_${nama}`).val(value);

            $(`#delete-id-${nama}`).val(id);
            $(`#delete-${nama}-warning-message`).html(`Hapus ${value}`);
        } else {
            $('#btn-action-tipe').css('visibility', 'hidden');
        }
    });
}
