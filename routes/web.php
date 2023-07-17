<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminKomplainController;
use App\Http\Controllers\KomplainController;
use App\Http\Controllers\RegisController;
use App\Http\Controllers\OwnerController;
use App\Mail\EmailVerification;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Auth Route
Route::post('/attempt-login', [WebController::class, 'attempt_login']);
Route::get('/check-this-user-role', [WebController::class, 'check_this_user_role']);
Route::get('/user-logout', [WebController::class, 'user_logout']);

// Forget Password Route
Route::post('/forget-password/verify-email', [WebController::class, 'fp_verify_email']);
Route::post('/forget-password/resend-otp', [WebController::class, 'fp_resend_otp']);
Route::post('/forget-password/set-new-pass', [WebController::class, 'fp_set_new_pass']);

// Account Regis Route
Route::get('/register', [RegisController::class, 'register']);
Route::get('/mail-check/{email}', [RegisController::class, 'mail_check']);
Route::post('/verification', [RegisController::class, 'verification']);
Route::get('/verification', function () {
    return redirect('/');
});
Route::get('/verification-resend/{id}', [RegisController::class, 'resend_code']);
Route::get('/verification-attempt/{id}', [RegisController::class, 'get_code']);
Route::post('/register-add', [RegisController::class, 'register_add']);

// Customer Route
Route::get('/', [WebController::class, 'index'])->name('index');
Route::get('/all-item', [WebController::class, 'all_item']);
Route::get('/get-keranjang-count', [WebController::class, 'keranjang_count']);
Route::get('/search-produk/{id}', [WebController::class, 'search_produk']);
Route::get('/produk-data/custom', [WebController::class, 'custom_page']);
Route::get('/produk-data/custom/{type}', [WebController::class, 'custom_page_type']);
Route::get('/produk-data/{kategori}', [WebController::class, 'produk_data_kategori']);
Route::post('/produk/{id}', [WebController::class, 'view']);
Route::get('/produk/{id}', [WebController::class, 'view_get']);

Route::group(['middleware' => ['auth', 'customerRole']], function () {
    Route::get('/get-notifikasi', [WebController::class, 'get_notifikasi']);
    Route::get('/notifikasi-read', [WebController::class, 'notifikasi_read']);
    Route::get('/keranjang', [WebController::class, 'keranjang']);
    Route::get('/keranjang/total', [WebController::class, 'keranjang_total']);
    Route::get('/keranjang-data', [WebController::class, 'keranjang_data']);
    Route::get('/tambah-keranjang/{id}/{jumlah}', [WebController::class, 'tambah_keranjang']);
    Route::get('/keranjang-produk-update/{id}/{jumlah}', [WebController::class, 'keranjang_produk_update']);
    Route::get('/hapus-keranjang/{id}', [WebController::class, 'hapus_keranjang']);
    Route::get('/lanjut-pesanan/cek-stok', [WebController::class, 'cek_stok']);
    Route::get('/informasi-pesanan', [WebController::class, 'informasi_pesanan']);
    Route::post('/pesanan-proses', [WebController::class, 'pesanan_proses']);
    Route::get('/pesanan', [WebController::class, 'pesanan']);
    Route::get('/get-status-pesanan/{id}', [WebController::class, 'status_pesanan']);
    Route::get('/get-detail-harga/{id}', [WebController::class, 'detail_harga']);
    Route::get('/pesanan/{id}', [WebController::class, 'detail_pesanan']);
    Route::post('/upload-bukti-pembayaran', [WebController::class, 'upload_bukti_pembayaran']);
    Route::get('/pesanan/batal/{id}', [WebController::class, 'pesanan_batal']);
    Route::get('/pesanan/{id}/selesai', [WebController::class, 'pesanan_selesai']);
    Route::get('/pesanan/selesai/{id}', [WebController::class, 'selesai_pesanan']);

    Route::get('/customer/chat/get', [WebController::class, 'chat_get']);
    Route::post('/customer/chat/send', [WebController::class, 'chat_send']);

    Route::post('/customer/chat/read', [WebController::class, 'chat_read']);
    Route::get('/customer/komplain/get', [KomplainController::class, 'get']);
    Route::post('/customer/komplain/add', [KomplainController::class, 'add']);

    // custom
    Route::get('/user/custom/general', [AdminController::class, 'general_list']);
    Route::get('/user/custom/general/bahan', [AdminController::class, 'bahan_list']);
    Route::get('/user/custom/general/laminasi', [AdminController::class, 'laminasi_list']);
    Route::get('/user/custom/{tipe}/tipe', [AdminController::class, 'tipe_get']);
    Route::get('/user/custom/desain/{tipe_id}/{part}', [AdminController::class, 'desain_get']);
    Route::post('/user/custom/desain/selfupload', [AdminController::class, 'desain_selfupload']);
    Route::post('/user/custom/create-order', [WebController::class, 'custom_create_order']);
    Route::get('/custom/informasi-pesanan', [WebController::class, 'informasi_pesanan_custom']);
    Route::post('/custom/pesanan-proses', [WebController::class, 'custom_pesanan_proses']);
});



// Admin Route
Route::group(['middleware' => ['auth', 'adminRole']], function () {
    // Route::get('/admin', function(){
    //     return view('admin.dashboard');
    // });
    Route::get('/admin/notification-badge', [AdminController::class, 'notification_badge']);
    Route::get('/admin/produk', [AdminController::class, 'produk']);
    Route::get('/admin/produk-data', [AdminController::class, 'produk_data']);
    Route::get('/admin/produk-data/{kategori}', [AdminController::class, 'produk_data_kategori']);
    Route::post('/admin/tambah-produk', [AdminController::class, 'tambah_produk']);
    Route::post('/admin/update-produk/{id}', [AdminController::class, 'update_produk']);
    Route::get('/admin/delete-produk/{id}', [AdminController::class, 'delete_produk']);
    Route::get('/cari-produk/{id}', [AdminController::class, 'cari_produk']);

    // Pesanan
    Route::get('/admin/pesanan/menunggu-konfirmasi', [AdminController::class, 'menunggu_konfirmasi']);
    Route::get('/admin/pesanan/menunggu-konfirmasi-data', [AdminController::class, 'menunggu_konfirmasi_data']);
    Route::post('/admin/pesanan/konfirmasi/{id}', [AdminController::class, 'konfirmasi_pesanan']);
    Route::post('/admin/pesanan/batal', [AdminController::class, 'batal_pesanan']);

    Route::get('/admin/pesanan/validasi-pembayaran', [AdminController::class, 'validasi_pembayaran']);
    Route::get('/admin/pesanan/validasi-pembayaran-data', [AdminController::class, 'validasi_pembayaran_data']);
    Route::get('/admin/pesanan/valid/{id}', [AdminController::class, 'pembayaran_valid']);
    Route::get('/admin/pesanan/invalid/{id}', [AdminController::class, 'pembayaran_invalid']);

    Route::get('/admin/pesanan/pengiriman', [AdminController::class, 'pengiriman']);
    Route::get('/admin/pesanan/antar/{id}', [AdminController::class, 'antar']);

    Route::get('/admin/pesanan/konfirmasi-tiba-di-tujuan', [AdminController::class, 'konfirmasi_tiba_di_tujuan']);
    Route::get('/admin/pesanan/tiba-di-tujuan/{id}', [AdminController::class, 'tiba_di_tujuan']);

    // Custom
    Route::get('/admin/custom/general', [AdminController::class, 'custom_general']);
    Route::get('/admin/custom/general/list', [AdminController::class, 'general_list']);
    Route::post('/admin/custom/general/list/update', [AdminController::class, 'general_list_update']);
    Route::get('/admin/custom/general/bahan', [AdminController::class, 'bahan_list']);
    Route::post('/admin/custom/general/bahan/add', [AdminController::class, 'bahan_add']);
    Route::post('/admin/custom/general/bahan/update/{id}', [AdminController::class, 'bahan_update']);
    Route::post('/admin/custom/general/bahan/delete', [AdminController::class, 'bahan_delete']);
    Route::get('/admin/custom/general/laminasi', [AdminController::class, 'laminasi_list']);
    Route::post('/admin/custom/general/laminasi/add', [AdminController::class, 'laminasi_add']);
    Route::post('/admin/custom/general/laminasi/update/{id}', [AdminController::class, 'laminasi_update']);
    Route::post('/admin/custom/general/laminasi/delete', [AdminController::class, 'laminasi_delete']);

    Route::get('/admin/custom/decal-motor', function () {
        return view('admin.customs.decal_motor');
    });
    Route::get('/admin/custom/striping-motor', function () {
        return view('admin.customs.striping_motor');
    });
    Route::get('/admin/custom/decal-mobil', function () {
        return view('admin.customs.decal_mobil');
    });
    Route::get('/admin/custom/{tipe}/tipe', [AdminController::class, 'tipe_get']);
    Route::post('/admin/custom/{tipe}/tipe/add', [AdminController::class, 'tipe_add']);
    Route::post('/admin/custom/{tipe}/tipe/update', [AdminController::class, 'tipe_update']);
    Route::post('/admin/custom/{tipe}/tipe/delete', [AdminController::class, 'tipe_delete']);
    Route::get('/admin/custom/desain/{tipe_id}/{part}', [AdminController::class, 'desain_get']);
    Route::post('/admin/custom/desain/{tipe_id}/{part}/add', [AdminController::class, 'desain_add']);
    Route::post('/admin/custom/desain/{tipe_id}/{part}/update', [AdminController::class, 'desain_update']);
    Route::post('/admin/custom/desain/{tipe_id}/{part}/delete', [AdminController::class, 'desain_delete']);

    // End Custom

    Route::get('/admin/semua-transaksi', [AdminController::class, 'semua_transaksi']);
    Route::get('/admin/detail-pesanan/{id}', [AdminController::class, 'detail_pesanan']);
    Route::get('/admin/semua-transaksi-data', [AdminController::class, 'semua_transaksi_data']);
    Route::get('/admin/cari-pesanan/{id}', [AdminController::class, 'cari_pesanan']);

    Route::get('/admin/laporan-transaksi', function () {
        return view('admin.report');
    });
    Route::post('/admin/laporan-transaksi/get', [AdminController::class, 'get_laporan_transaksi']);

    Route::get('/admin/komplain', [AdminKomplainController::class, 'komplain_view']);
    Route::get('/admin/komplain/get', [AdminKomplainController::class, 'get']);
    Route::post('/admin/komplain/read-message', [AdminKomplainController::class, 'read_chat']);
    Route::post('/admin/komplain/send-message', [AdminKomplainController::class, 'send']);
});

// Owner Route
Route::group(['middleware' => ['auth', 'ownerRole']], function () {
    Route::get('/owner', [OwnerController::class, 'dashboard']);
    Route::get('/owner/produk-data', [OwnerController::class, 'produk_data']);
    Route::get('/owner/produk-data/{kategori}', [OwnerController::class, 'produk_by_kategori']);
    Route::get('/owner/cari-produk/{id}', [OwnerController::class, 'cari_produk']);
    Route::get('/owner/detail-pesanan/{id}', [OwnerController::class, 'detail_pesanan']);
    Route::get('/owner/semua-transaksi', [OwnerController::class, 'semua_transaksi']);
    Route::get('/owner/semua-transaksi-data', [OwnerController::class, 'semua_transaksi_data']);
    Route::get('/owner/cari-pesanan/{id}', [OwnerController::class, 'cari_pesanan']);

    Route::get('/owner/chat/get-users', [OwnerController::class, 'chat_get_users']);
    Route::post('/owner/chat/get-message', [OwnerController::class, 'chat_get_message']);
    Route::post('/owner/chat/read-message', [OwnerController::class, 'chat_read_message']);
    Route::post('/owner/chat/send-message', [OwnerController::class, 'chat_send_message']);
});
