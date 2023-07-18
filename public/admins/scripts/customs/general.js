// General

ajaxRequest.get({ url: '/admin/custom/general/list' }).then((res) => {
    $('#general-upload_desain').val(res.upload_desain);
    $('#general-sticker_panjang').val(res.sticker_panjang);
    $('#general-sticker_lebar').val(res.sticker_lebar);

    $('#btn-save-general').on('click', function () {
        if ($('#general-upload_desain').val().replaceAll(' ', '').length === 0) return alert('Masukkan harga upload desain');
        // if ($('#general-sticker_panjang').val().replaceAll(' ', '').length === 0) return alert('Masukkan harga panjang sticker');
        // if ($('#general-sticker_lebar').val().replaceAll(' ', '').length === 0) return alert('Masukkan harga lebar sticker');

        $('#btn-save-general').attr('disabled', true);
        ajaxRequest
            .post({
                url: '/admin/custom/general/list/update',
                data: {
                    upload_desain: $('#general-upload_desain').val(),
                    // sticker_panjang: $('#general-sticker_panjang').val(),
                    // sticker_lebar: $('#general-sticker_lebar').val(),
                    sticker_panjang: 0,
                    sticker_lebar: 0,
                },
            })
            .then((res) => {
                $('#btn-save-general').removeAttr('disabled');
                toastSuccess(res);
            });
    });
});
