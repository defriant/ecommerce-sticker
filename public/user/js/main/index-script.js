$(window).on('load', function () {
    tambah_keranjang();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
    });
});

function all_item() {
    $.ajax({
        type: 'get',
        url: '/all-item',
        success: function (data) {
            $('#product-loader').hide();
            $('#product-data').html(data);
            tambah_keranjang();
            history.pushState('', '', '/');
        },
    });
}

$('#search-produk').on('input', function () {
    if ($('#search-produk').val().length == 0) {
        $('.btn-kategori').removeClass('active');
        $('#all').addClass('active');
        $('#search-icon').hide();
        $('#search-loading').show();
        $.ajax({
            type: 'get',
            url: '/all-item',
            success: function (data) {
                $('#search-loading').hide();
                $('#search-icon').show();
                $('#product-data').html(data);
                tambah_keranjang();
                $('.title-kategori h3 b').html('Semua Produk');
                $('.title-kategori').show();
                history.pushState('', '', '/');
            },
        });
    } else if ($('#search-produk').val().length % 3 == 0) {
        $('#search-icon').hide();
        $('#search-loading').show();
        $('.btn-kategori').removeClass('active');
        $('#all').addClass('active');
        var id = $('#search-produk').val();
        $.ajax({
            type: 'get',
            url: '/search-produk/' + id,
            success: function (data) {
                $('#search-loading').hide();
                $('#search-icon').show();
                $('#product-data').html(data);
                tambah_keranjang();
                $('.title-kategori h3 b').html('Semua Produk');
                $('.title-kategori').show();
                history.pushState('', '', '/');
            },
        });
    }
});

$('.btn-kategori').on('click', function () {
    $('#product-data').empty();
    $('#product-loader').fadeIn(500);
    $('.btn-kategori').removeClass('active');
    $(this).addClass('active');
    $('.title-kategori h3 b').html($(this).find('h5').eq(0).html());
    $('.title-kategori').show();
    let kategori = $(this).data('kategori');
    if (kategori == 'all') {
        all_item();
    } else {
        $.ajax({
            type: 'get',
            url: `/produk-data/${kategori}`,
            success: function (data) {
                $('#product-loader').hide();
                $('#product-data').html(data);
                tambah_keranjang();
                if (kategori === 'custom') customPage();
                history.pushState('', '', '/');
            },
        });
    }
});

// custom page

function getActiveCustomTab(type) {
    $('#custom-page').empty();
    $('#custom-page-loader').fadeIn(500);
    $.ajax({
        type: 'get',
        url: `/produk-data/custom/${type}`,
        success: function (data) {
            $('#custom-page-loader').hide();
            $('#custom-page').html(data);
            $('#custom-page-type').html(type);

            switch (type) {
                case 'decal_motor':
                    initiateCustomScript({
                        tipe: 'decal_motor',
                        nama: 'motor',
                        sections: ['spakbor_depan', 'covershock', 'batok_kepala', 'body_depan', 'sayap', 'body_samping', 'arm', 'spakbor_belakang'],
                    });
                    break;

                case 'decal_mobil':
                    initiateCustomScript({
                        tipe: 'decal_mobil',
                        nama: 'mobil',
                        sections: ['depan', 'samping', 'pintu', 'belakang', 'kaca_depan', 'kaca_belakang'],
                    });
                    break;

                case 'striping_motor':
                    initiateCustomScript({
                        tipe: 'striping_motor',
                        nama: 'motor',
                        sections: ['spakbor_depan', 'covershock', 'batok_kepala', 'body_depan', 'sayap', 'body_samping', 'arm', 'spakbor_belakang'],
                    });
                    break;

                default:
                    break;
            }
        },
    });
}

function customPage() {
    $('.custom-tab').on('click', function () {
        $('.custom-tab').removeClass('active');
        $(this).addClass('active');
        getActiveCustomTab($(this).data('type'));
    });

    const currentActive = $('.custom-tab.active').data('type');
    getActiveCustomTab(currentActive);
}

function initiateCustomScript({ tipe = '', nama = '', sections = [] }) {
    const customData = {
        bahan: null,
        laminasi: null,
    };

    sections.forEach((section) => {
        customData[section] = null;
    });

    function calculateTotal() {
        let showCheckout = false;
        let totalPrice = 0;

        sections.forEach((section) => {
            if (customData[section] !== null) {
                showCheckout = true;
                totalPrice += parseInt(customData[section].price);
            }
        });

        if (customData.bahan === null) showCheckout = false;
        if (customData.laminasi === null) showCheckout = false;

        if (showCheckout) $(`#btn-checkout-${nama}`).show();
        if (!showCheckout) $(`#btn-checkout-${nama}`).hide();

        if (customData.bahan !== null) totalPrice += parseInt(customData.bahan.price);
        if (customData.laminasi !== null) totalPrice += parseInt(customData.laminasi.price);

        if (totalPrice !== 0) {
            $(`#total-price-${nama}`).html(`Rp ${totalPrice}`);
        } else {
            $(`#total-price-${nama}`).html(`-`);
        }
    }

    function getSection(tipe_id, section) {
        customData[section] = null;
        $(`#preview-${section}`).html(`<div style="display: flex; flex-direction: column; gap: 1rem; align-items: center;">
                        <i class="fas fa-ban" style="font-size: 75px; opacity: .5;"></i>
                        <span style="font-weight: bold; opacity: .5;">Tanpa sticker</span>
                    </div>`);
        $(`#price-${section}`).empty();

        $(`#loader-${section}`).html(`<div class="loadingio-spinner-dual-ring-r5iq5osejl">
            <div class="ldio-c34g0uje79h">
                <div></div>
                <div>
                    <div></div>
                </div>
            </div>
        </div>`);

        $(`#loader-${section}`).show();
        $(`#list-${section}`).empty();

        ajaxRequest.get({ url: `/user/custom/desain/${tipe_id}/${section}` }).then((res) => {
            $(`#loader-${section}`).hide();
            $(`#list-${section}`).html(`
            <button type="button" class="card card-${section} selected">
                <div class="selected-icon">
                    <i class="fas fa-check"></i>
                </div>
                <i class="fas fa-ban"></i>
                <span>Tanpa Sticker</span>
            </button>

            ${res
                .map(
                    (v) => `
            <button
                type="button"
                class="card card-${section}"
                style="background-color: #FFF" data-id="${v.id}"
                data-nama="${v.nama}"
                data-url="/admins/desain_img/${v.gambar}"
                data-harga="${v.harga}"
            >
                <div class="selected-icon">
                    <i class="fas fa-check"></i>
                </div>
                <img src="/admins/desain_img/${v.gambar}" class="card-image">
                <span>${v.nama}</span>
            </button>`
                )
                .join('')}

            <button type="button" class="card card-${section}-upload">
                <div class="selected-icon">
                    <i class="fas fa-check"></i>
                </div>
                <i class="fas fa-upload upload-icon"></i>
                <span class="upload-text">Upload design</span>
                <span class="upload-loader" style="display: none">Uploading ... </span>
            </button>
            <input type="file" id="upload-design-${section}" style="display: none;">
            `);

            $(`.card-${section}`).on('click', function () {
                $(`.card-${section}`).removeClass('selected');
                $(`.card-${section}-upload`).removeClass('selected');
                $(this).addClass('selected');

                if ($(this).data('id') && $(this).data('url') && $(this).data('nama')) {
                    customData[section] = {
                        id: $(this).data('id'),
                        nama: $(this).data('nama'),
                        url: $(this).data('url'),
                        price: parseInt($(this).data('harga')),
                    };

                    $(`#preview-${section}`).html(`<img src="${$(this).data('url')}" style="width: 100%; height: 100%">`);
                    $(`#price-${section}`).html(`Rp ${$(this).data('harga')}`);
                } else {
                    customData[section] = null;
                    $(`#preview-${section}`).html(`<div style="display: flex; flex-direction: column; gap: 1rem; align-items: center;">
                        <i class="fas fa-ban" style="font-size: 75px; opacity: .5;"></i>
                        <span style="font-weight: bold; opacity: .5;">Tanpa sticker</span>
                    </div>`);
                    $(`#price-${section}`).empty();
                }

                calculateTotal();
            });

            $(`.card-${section}-upload`).on('click', () => $(`#upload-design-${section}`).click());
            $(`#upload-design-${section}`).on('change', function () {
                const fileObject = this.files[0];
                if (fileObject) {
                    $(`.card-${section}-upload`).attr('disabled', true);
                    $(`.card-${section}`).attr('disabled', true);

                    $(`.card-${section}-upload`).removeClass('selected');
                    $(`.card-${section}`).removeClass('selected');

                    $(`.card-${section}-upload .upload-icon`).hide();
                    $(`.card-${section}-upload .upload-text`).hide();
                    $(`.card-${section}-upload .upload-loader`).show();

                    const data = new FormData();
                    data.append('gambar', fileObject);

                    $.ajax({
                        type: 'POST',
                        url: `/user/custom/desain/selfupload`,
                        data: data,
                        contentType: false,
                        processData: false,
                        success: (res) => {
                            $(`.card-${section}-upload`).removeAttr('disabled');
                            $(`.card-${section}`).removeAttr('disabled');

                            $(`.card-${section}-upload`).addClass('selected');
                            $(`.card-${section}`).removeClass('selected');

                            $(`.card-${section}-upload .upload-loader`).hide();
                            $(`.card-${section}-upload .upload-icon`).show();
                            $(`.card-${section}-upload .upload-text`).show();

                            customData[section] = {
                                id: res.id,
                                nama: 'Self upload',
                                url: `/admins/desain_img/${res.gambar}`,
                                price: res.harga,
                            };

                            $(`#preview-${section}`).html(`<img src="/admins/desain_img/${res.gambar}" style="width: 100%; height: 100%">`);
                            $(`#price-${section}`).html(`Rp ${res.harga}`);
                            calculateTotal();
                        },
                    });
                }
            });
        });
    }

    ajaxRequest.get({ url: `/user/custom/${tipe}/tipe` }).then((res) => {
        $(`#jenis_${nama}`).html(`
            <option value="" disabled selected>-- Pilih jenis ${nama} --</option>
            ${res.map((v) => `<option value="${v.id}">${v.nama}</option>`).join('')}
        `);

        $(`#jenis_${nama}`).on('change', function () {
            sections.forEach((section) => getSection($(this).val(), section));
        });
    });

    ajaxRequest.get({ url: '/user/custom/general/bahan' }).then((res) => {
        $(`#bahan-${nama}`).html(`
        <option value="" disabled selected>-- Pilih bahan --</option>
        ${res.map((v) => `<option value="${v.id}">${v.nama} - Rp ${v.harga}</option>`).join('')}
        `);

        $(`#bahan-${nama}`).on('change', function () {
            const data = res.find((v) => v.id === parseInt($(this).val()));
            customData.bahan = {
                id: data.id,
                nama: data.nama,
                price: data.harga,
            };

            $(`#preview-bahan-${nama}`).html(`${data.nama} - Rp ${data.harga}`);
            calculateTotal();
        });
    });

    ajaxRequest.get({ url: '/user/custom/general/laminasi' }).then((res) => {
        $(`#laminasi-${nama}`).html(`
        <option value="" disabled selected>-- Pilih laminasi --</option>
        ${res.map((v) => `<option value="${v.id}">${v.nama} - Rp ${v.harga}</option>`).join('')}
        `);

        $(`#laminasi-${nama}`).on('change', function () {
            const data = res.find((v) => v.id === parseInt($(this).val()));
            customData.laminasi = {
                id: data.id,
                nama: data.nama,
                price: data.harga,
            };

            $(`#preview-laminasi-${nama}`).html(`${data.nama} - Rp ${data.harga}`);
            calculateTotal();
        });
    });

    $(`#btn-checkout-${nama}`).on('click', function () {
        $(`#btn-checkout-${nama}`).attr('disabled', true);

        ajaxRequest
            .post({
                url: '/user/custom/create-order',
                data: customData,
            })
            .then((res) => (location.href = '/custom/informasi-pesanan'));
    });
}

// end custom page

function view_produk(url) {
    $('#product-data').empty();
    $('#product-loader').fadeIn(500);
    $.ajax({
        type: 'post',
        url: url,
        success: function (data) {
            $('#product-loader').hide();
            $('.title-kategori').hide();
            $('.btn-kategori').removeClass('active');
            $('#product-data').html(data);
            view_script();
            history.pushState('', '', url);
        },
    });
    return false;
}

function tambah_keranjang() {
    $('.tambah-keranjang').on('click', function () {
        var jumlah_keranjang = parseInt($('#badge-keranjang').html());
        var id = $(this).data('idproduk');
        var jumlah = $(this).data('jumlah');
        $.ajax({
            type: 'get',
            url: '/tambah-keranjang/' + id + '/' + jumlah,
            success: function (data) {
                if (jumlah_keranjang > 0) {
                    $('#badge-keranjang').html(jumlah_keranjang + 1);
                } else {
                    $('#keranjang').append('<span id="badge-keranjang" class="badge badge-primary badge-notif">1</span>');
                }
                toastr.options = {
                    timeOut: '5000',
                };

                toastr['info']('1 item ditambahkan ke keranjang <a href="/keranjang">Lihat keranjang...</a>');
            },
        });
    });
}

function no_telp() {
    $('#telp').on('keypress', function (e) {
        var charCode = e.which ? e.which : e.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
        }
        return true;
    });
}

function persyaratan_check() {
    $('#persyaratan').on('click', function () {
        if ($('input[name="agree"]:checked').length > 0) {
            $('#persyaratan-text').removeClass('persyaratan-invalid');
            $('#persyaratan-text').addClass('persyaratan-valid');
        } else {
            $('#persyaratan-text').removeClass('persyaratan-valid');
            $('#persyaratan-text').addClass('persyaratan-invalid');
        }
    });
}

// Custom pesanan script
function custom_pesanan_submit() {
    if ($('#input-foto-contoh-barang').val().length == 0) {
        alert('Masukan foto contoh barang');
    } else if ($('#nama-barang').val().length == 0) {
        alert('Masukan nama barang');
    } else if ($('#kategori-barang').val().length == 0) {
        alert('Pilih kategori barang');
    } else if ($('#kategori-barang').val() == 'kitchen-set') {
        if ($('#jumlah-panjang').val().length == 0 || $('#jumlah-panjang').val() == 0) {
            alert('Tentukan panjang');
        } else if ($('#warna').val().length == 0) {
            alert('Masukan tipe katalog warna');
        } else if ($('#deskripsi-barang').val().length == 0) {
            alert('Masukan deskripsi barang');
        } else if ($('#nama-pemesan').val().length == 0) {
            alert('Masukan Pemesan');
        } else if ($('#telp').val().length == 0) {
            alert('Masukan nomor telepon');
        } else if ($('#alamat').val().length == 0) {
            alert('Masukan alamat');
        } else if ($('input[name="agree"]:checked').length == 0) {
            alert('Setujui syarat dan ketentuan');
            $('#persyaratan-text').removeClass('persyaratan-valid');
            $('#persyaratan-text').addClass('persyaratan-invalid');
        } else {
            $('#form-custom-pesanan').submit();
            $('#form-custom-pesanan').on('submit', function (e) {
                e.preventDefault();
            });
        }
    } else if ($('#kategori-barang').val() == 'dll') {
        if ($('#jumlah-panjang').val().length == 0 || $('#jumlah-panjang').val() == 0) {
            alert('Tentukan panjang');
        } else if ($('#jumlah-lebar').val().length == 0 || $('#jumlah-lebar').val() == 0) {
            alert('Tentukan lebar');
        } else if ($('#warna').val().length == 0) {
            alert('Masukan tipe katalog warna');
        } else if ($('#deskripsi-barang').val().length == 0) {
            alert('Masukan deskripsi barang');
        } else if ($('#nama-pemesan').val().length == 0) {
            alert('Masukan Pemesan');
        } else if ($('#telp').val().length == 0) {
            alert('Masukan nomor telepon');
        } else if ($('#alamat').val().length == 0) {
            alert('Masukan alamat');
        } else if ($('input[name="agree"]:checked').length == 0) {
            alert('Setujui syarat dan ketentuan');
            $('#persyaratan-text').removeClass('persyaratan-valid');
            $('#persyaratan-text').addClass('persyaratan-invalid');
        } else {
            $('#form-custom-pesanan').submit();
            $('#form-custom-pesanan').on('submit', function (e) {
                e.preventDefault();
            });
        }
    }
}

function lihat_pesanan() {
    window.location = '/pesanan';
}

class requestData {
    post(params) {
        let url = params.url;
        let data = params.data;

        return new Promise((resolve, reject) => {
            $.ajax({
                type: 'POST',
                url: url,
                dataType: 'json',
                contentType: 'application/json',
                data: JSON.stringify(data),
                success: function (result) {
                    resolve(result);
                },
                error: function (result) {
                    alert('Oops! Something went wrong ..');
                },
            });
        });
    }

    get(params) {
        let url = params.url;

        return new Promise((resolve, reject) => {
            $.ajax({
                type: 'GET',
                url: url,
                dataType: 'json',
                contentType: 'application/json',
                success: function (result) {
                    resolve(result);
                },
                error: function (result) {
                    alert('Oops! Something went wrong ..');
                },
            });
        });
    }
}

const ajaxRequest = new requestData();
