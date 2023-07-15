function initiateCustomScript({ tipe = '', nama = '', sections = [] }) {
    if (!tipe || !nama) return console.error('initiateCustomScript params tipe and nama is required');

    function getTipe(selected = null) {
        ajaxRequest.get({ url: `/admin/custom/${tipe}/tipe` }).then((res) => {
            let selectTipeEl = `<option value="" disabled${selected ? '' : ' selected'}>-- Pilih tipe ${nama} --</option>`;
            if (res.length > 0) {
                selectTipeEl += `${res.map((v) => `<option value="${v.id}"${v.id === selected ? ' selected' : ''}>${v.nama}</option>`).join('')}
                    `;
            }
            $(`#select-tipe-${nama}`).html(selectTipeEl);
            $(`#select-tipe-${nama}`).trigger('change');
        });
    }

    getTipe();

    function getSection(tipe_id, sectionName) {
        ajaxRequest.get({ url: `/admin/custom/desain/${tipe_id}/${sectionName}` }).then((res) => {
            $(`#loader-${sectionName}`).hide();

            if (res.length > 0) {
                $(`#null-data-${sectionName}`).hide();
                $(`#list-data-${sectionName}`).html(
                    res
                        .map(
                            (v) => `
                            <div class="grid-card">
                                <div class="img-card">
                                    <img src="/admins/desain_img/${v.gambar}">
                                </div>
                                <div class="detail-card">
                                    <h5 class="title-detail">${v.nama}</h5>
                                    <p class="price-detail">Rp. ${v.harga}</p>
                                    <div class="tool-detail">
                                        <button
                                            class="btn-table-action edit edit-${sectionName}"
                                            data-id="${v.id}"
                                            data-nama="${v.nama}"
                                            data-harga="${v.harga}"
                                            data-gambar="/admins/desain_img/${v.gambar}"
                                        >
                                            <i class="fas fa-pen"></i>
                                        </button>
                                        <button
                                            class="btn-table-action delete delete-${sectionName}"
                                            data-id="${v.id}"
                                            data-nama="${v.nama}"
                                        >
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>`
                        )
                        .join('')
                );

                $(`.edit-${sectionName}`).on('click', function () {
                    $(`#update-gambar-preview-${sectionName}`).css('background-image', `url(${$(this).data('gambar')})`);
                    $(`#update-old-gambar-${sectionName}`).attr('data-url', $(this).data('gambar'));

                    $(`#update-id-${sectionName}`).val($(this).data('id'));
                    $(`#update-nama-${sectionName}`).val($(this).data('nama'));
                    $(`#update-harga-${sectionName}`).val($(this).data('harga'));
                    $(`#modal-update-${sectionName}`).modal('show');
                });

                $(`.delete-${sectionName}`).on('click', function () {
                    $(`#delete-id-${sectionName}`).val($(this).data('id'));
                    $(`#delete-${sectionName}-warning-message`).html(`Hapus ${$(this).data('nama')} ?`);
                    $(`#modal-delete-${sectionName}`).modal('show');
                });
            } else {
                $(`#null-data-${sectionName}`).show();
            }
        });
    }

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
        if (!$(`#update-tipe_${nama}`).val()) return alert('Masukkan nama tipe');

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

            sections.forEach((section) => {
                $(`#list-data-${section}`).empty();
                $(`#null-data-${section}`).hide();
                $(`#btn-trigger-add-${section}`).show();
                $(`#loader-${section}`).show();
                getSection(id, section);
            });
        } else {
            sections.forEach((section) => {
                $(`#list-data-${section}`).empty();
                $(`#btn-trigger-add-${section}`).hide();
                $(`#loader-${section}`).hide();
                $(`#null-data-${section}`).show();
            });
            $('#btn-action-tipe').css('visibility', 'hidden');
        }
    });

    sections.forEach((section) => {
        // Add
        $(`#add-choose-gambar-${section}`).on('click', () => $(`#add-gambar-${section}`).click());
        $(`#add-gambar-${section}`).on('change', function () {
            const fileObject = this.files[0];
            if (fileObject) {
                const fileReader = new FileReader();
                fileReader.readAsDataURL(fileObject);
                fileReader.onload = function () {
                    const result = fileReader.result;
                    $(`#add-gambar-preview-${section}`).css('background-image', `url('${result}')`);
                };
            } else {
                $(`#add-gambar-preview-${section}`).css('background-image', `url('/user/images/no_image.png')`);
            }
        });

        $(`#form-add-${section}`).on('submit', function (e) {
            e.preventDefault();
            if (!$(`#select-tipe-${nama}`).val()) return;
            if (!$(`#add-gambar-${section}`).val()) return alert('Pilih gambar desain');
            if (!$(`#add-nama-${section}`).val()) return alert('Masukkan nama desain');
            if (!$(`#add-harga-${section}`).val()) return alert('Masukkan harga desain');

            const data = new FormData($(this)[0]);
            const tipe_id = $(`#select-tipe-${nama}`).val();

            $(`#btn-add-${section}`).attr('disabled', true);
            $.ajax({
                type: 'POST',
                url: `/admin/custom/desain/${tipe_id}/${section}/add`,
                data: data,
                contentType: false,
                processData: false,
                success: (res) => {
                    toastSuccess(res);
                    $(`#modal-add-${section}`).modal('hide');
                    getSection(tipe_id, section);
                },
            });
        });

        $(`#modal-add-${section}`).on('hide.bs.modal', function () {
            setTimeout(() => {
                $(`#add-gambar-preview-${section}`).css('background-image', `url('/user/images/no_image.png')`);
                $(`#add-gambar-${section}`).val('');
                $(`#add-nama-${section}`).val('');
                $(`#add-harga-${section}`).val('');
                $(`#btn-add-${section}`).removeAttr('disabled');
            }, 300);
        });

        // Update
        $(`#update-choose-gambar-${section}`).on('click', () => $(`#update-gambar-${section}`).click());
        $(`#update-gambar-${section}`).on('change', function () {
            const fileObject = this.files[0];
            if (fileObject) {
                const fileReader = new FileReader();
                fileReader.readAsDataURL(fileObject);
                fileReader.onload = function () {
                    const result = fileReader.result;
                    $(`#update-gambar-preview-${section}`).css('background-image', `url('${result}')`);
                };
            } else {
                $(`#update-gambar-preview-${section}`).css('background-image', `url(${$(`#update-old-gambar-${section}`).data('url')})`);
            }
        });

        $(`#form-update-${section}`).on('submit', function (e) {
            e.preventDefault();
            if (!$(`#select-tipe-${nama}`).val()) return;
            if (!$(`#update-nama-${section}`).val()) return alert('Masukkan nama desain');
            if (!$(`#update-harga-${section}`).val()) return alert('Masukkan harga desain');

            const data = new FormData($(this)[0]);
            const tipe_id = $(`#select-tipe-${nama}`).val();

            $(`#btn-update-${section}`).attr('disabled', true);
            $.ajax({
                type: 'POST',
                url: `/admin/custom/desain/${tipe_id}/${section}/update`,
                data: data,
                contentType: false,
                processData: false,
                success: (res) => {
                    toastSuccess(res);
                    $(`#modal-update-${section}`).modal('hide');
                    getSection(tipe_id, section);
                },
            });
        });

        $(`#modal-update-${section}`).on('hide.bs.modal', function () {
            setTimeout(() => {
                $(`#update-gambar-preview-${section}`).css('background-image', `url('/user/images/no_image.png')`);
                $(`#update-gambar-${section}`).val('');
                $(`#update-nama-${section}`).val('');
                $(`#update-harga-${section}`).val('');
                $(`#btn-update-${section}`).removeAttr('disabled');
            }, 300);
        });

        // Delete
        $(`#btn-delete-${section}`).on('click', function () {
            if (!$(`#delete-id-${section}`)) return;
            const tipe_id = $(`#select-tipe-${nama}`).val();
            $(this).attr('disabled', true);
            ajaxRequest
                .post({
                    url: `/admin/custom/desain/${tipe_id}/${section}/delete`,
                    data: {
                        id: $(`#delete-id-${section}`).val(),
                    },
                })
                .then((res) => {
                    toastSuccess(res);
                    $(`#modal-delete-${section}`).modal('hide');
                    getSection(tipe_id, section);
                });
        });

        $(`#modal-delete-${section}`).on('hide.bs.modal', function () {
            setTimeout(() => {
                $(`#btn-delete-${section}`).removeAttr('disabled');
                $(`#delete-id-${section}`).val('');
                $(`#delete-${section}-warning-message`).empty();
            }, 300);
        });
    });
}
