<div class="panel panel-headline">
    <div class="panel-body">
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <h4>Bahan</h4>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-add-bahan">+ Tambah
                Data</button>
        </div>
        <br>
        <div class="loader" id="loader-bahan">
            <div class="loader4"></div>
            <h5 style="margin-top: 2.5rem">Loading data</h5>
        </div>
        <div class="loader" id="null-data-bahan" hidden>
            <i class="fas fa-ban" style="font-size: 5rem; opacity: .5"></i>
            <h5 style="margin-top: 2.5rem; opacity: .75">Belum ada data</h5>
        </div>
        <table class="table" id="table-bahan" hidden>
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th></th>
                </tr>
            </thead>
            <tbody id="data-bahan">

            </tbody>
        </table>
    </div>
</div>

{{-- Modals --}}
<div class="modal fade" id="modal-add-bahan" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="padding-top: 7px; padding-bottom: 7px;">
                <h5 style="font-weight: 500; font-size: 18px">Tambah Data Bahan</h5>
            </div>
            <div class="modal-body">
                <h5>Nama</h5>
                <input id="add-nama_bahan" type="text" class="form-control">
                <br>

                <h5>Harga</h5>
                <div class="input-group">
                    <span class="input-group-addon">Rp.</span>
                    <input id="add-harga_bahan" type="text" class="form-control input-number">
                </div>
                <br>
            </div>
            <div class="modal-footer">
                <button id="submit-add-bahan" type="submit" class="btn btn-primary">Tambahkan</button>
                <button type="button" id="modal-tambah-close" class="btn btn-default"
                    data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-update-bahan" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="padding-top: 7px; padding-bottom: 7px;">
                <h5 style="font-weight: 500; font-size: 18px">Ubah Data Bahan</h5>
            </div>
            <div class="modal-body">
                <input type="hidden" id="update-id-bahan">

                <h5>Nama</h5>
                <input id="update-nama_bahan" type="text" class="form-control">
                <br>

                <h5>Harga</h5>
                <div class="input-group">
                    <span class="input-group-addon">Rp.</span>
                    <input id="update-harga_bahan" type="text" class="form-control input-number">
                </div>
                <br>
            </div>
            <div class="modal-footer">
                <button id="submit-update-bahan" type="submit" class="btn btn-primary">Simpan perubahan</button>
                <button type="button" id="modal-tambah-close" class="btn btn-default"
                    data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-delete-bahan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h4 class="text-center" style="margin-top: 3rem" id="delete-bahan-warning-message"></h4>
                <input type="hidden" id="delete-id-bahan">
                <div style="margin-top: 5rem; text-align: center">
                    <button type="button" class="btn btn-danger" id="btn-delete-bahan">Hapus</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                </div>
            </div>
        </div>
    </div>
</div>
