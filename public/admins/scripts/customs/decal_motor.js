initiateTipe({ tipe: 'decal_motor', nama: 'motor' });

// function getTipe(selected = null) {
//     ajaxRequest.get({ url: '/admin/custom/decal_motor/tipe' }).then((res) => {
//         let selectTipeEl = `<option value="" disabled${
//             selected ? '' : ' selected'
//         }>-- Pilih tipe motor --</option>`;
//         if (res.length > 0) {
//             selectTipeEl += `${res
//                 .map(
//                     (v) =>
//                         `<option value="${v.id}"${
//                             v.id === selected ? ' selected' : ''
//                         }>${v.nama}</option>`
//                 )
//                 .join('')}
//             `;
//         }
//         $('#select-tipe-motor').html(selectTipeEl);
//         $('#select-tipe-motor').trigger('change');
//     });
// }

// getTipe();

// $('#submit-add-motor').on('click', function () {
//     if (!$('#add-tipe_motor').val()) alert('Masukkan nama tipe');

//     $(this).attr('disabled', true);
//     ajaxRequest
//         .post({
//             url: '/admin/custom/decal_motor/tipe/add',
//             data: {
//                 nama: $('#add-tipe_motor').val(),
//             },
//         })
//         .then((res) => {
//             toastSuccess(res.message);
//             getTipe(res.data.id);
//             $('#modal-add-motor').modal('hide');
//         });
// });

// $('#modal-add-motor').on('hide.bs.modal', function () {
//     setTimeout(() => {
//         $('#add-tipe_motor').val('');
//         $('#submit-add-motor').removeAttr('disabled');
//     }, 300);
// });

// $('#submit-update-motor').on('click', function () {
//     if (!$('#update-id-motor').val()) return;
//     if (!$('#update-tipe_motor').val()) return alert('Masukkan nama tipe');

//     $(this).attr('disabled', true);
//     ajaxRequest
//         .post({
//             url: '/admin/custom/decal_motor/tipe/update',
//             data: {
//                 id: $('#update-id-motor').val(),
//                 nama: $('#update-tipe_motor').val(),
//             },
//         })
//         .then((res) => {
//             toastSuccess(res.message);
//             getTipe(res.data.id);
//             $('#modal-update-motor').modal('hide');
//         });
// });

// $('#modal-update-motor').on('hide.bs.modal', function () {
//     setTimeout(() => {
//         $('#submit-update-motor').removeAttr('disabled');
//     }, 300);
// });

// $('#btn-delete-motor').on('click', function () {
//     if (!$('#delete-id-motor').val()) return;

//     $(this).attr('disabled', true);
//     ajaxRequest
//         .post({
//             url: '/admin/custom/decal_motor/tipe/delete',
//             data: {
//                 id: $('#delete-id-motor').val(),
//             },
//         })
//         .then((res) => {
//             toastSuccess(res);
//             getTipe();
//             $('#modal-delete-motor').modal('hide');
//         });
// });

// $('#modal-delete-motor').on('hide.bs.modal', function () {
//     setTimeout(() => {
//         $('#btn-delete-motor').removeAttr('disabled');
//     }, 300);
// });

// $('#select-tipe-motor').on('change', function () {
//     if ($(this).val() !== null) {
//         const id = $(this).val();
//         const nama = $(this).find(':selected').html();

//         $('#btn-action-tipe').css('visibility', 'visible');
//         $('.tipe-nama').html(nama);

//         $('#update-id-motor').val(id);
//         $('#update-tipe_motor').val(nama);

//         $('#delete-id-motor').val(id);
//         $('#delete-motor-warning-message').html(`Hapus ${nama}`);
//     } else {
//         $('#btn-action-tipe').css('visibility', 'hidden');
//     }
// });
