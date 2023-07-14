<div class="panel panel-headline">
    <div class="panel-body">
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <h4>Laminasi</h4>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-add-laminasi">+ Tambah
                Data</button>
        </div>
        <br>
        <div class="loader" id="loader-laminasi">
            <div class="loader4"></div>
            <h5 style="margin-top: 2.5rem">Loading data</h5>
        </div>
        <div class="loader" id="null-data-laminasi" hidden>
            <i class="fas fa-ban" style="font-size: 5rem; opacity: .5"></i>
            <h5 style="margin-top: 2.5rem; opacity: .75">Belum ada data</h5>
        </div>
        <table class="table" id="table-laminasi" hidden>
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th></th>
                </tr>
            </thead>
            <tbody id="data-laminasi">

            </tbody>
        </table>
    </div>
</div>

{{-- Modals --}}
<div class="modal fade" id="modal-add-laminasi" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="padding-top: 7px; padding-bottom: 7px;">
                <h5 style="font-weight: 500; font-size: 18px">Tambah Data Laminasi</h5>
            </div>
            <div class="modal-body">
                <h5>Nama</h5>
                <input id="add-nama_laminasi" type="text" class="form-control">
                <br>

                <h5>Harga</h5>
                <div class="input-group">
                    <span class="input-group-addon">Rp.</span>
                    <input id="add-harga_laminasi" type="text" class="form-control input-number">
                </div>
                <br>
            </div>
            <div class="modal-footer">
                <button id="submit-add-laminasi" type="submit" class="btn btn-primary">Tambahkan</button>
                <button type="button" id="modal-tambah-close" class="btn btn-default"
                    data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-update-laminasi" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="padding-top: 7px; padding-bottom: 7px;">
                <h5 style="font-weight: 500; font-size: 18px">Ubah Data Laminasi</h5>
            </div>
            <div class="modal-body">
                <input type="hidden" id="update-id-laminasi">

                <h5>Nama</h5>
                <input id="update-nama_laminasi" type="text" class="form-control">
                <br>

                <h5>Harga</h5>
                <div class="input-group">
                    <span class="input-group-addon">Rp.</span>
                    <input id="update-harga_laminasi" type="text" class="form-control input-number">
                </div>
                <br>
            </div>
            <div class="modal-footer">
                <button id="submit-update-laminasi" type="submit" class="btn btn-primary">Simpan perubahan</button>
                <button type="button" id="modal-tambah-close" class="btn btn-default"
                    data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-delete-laminasi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h4 class="text-center" style="margin-top: 3rem" id="delete-laminasi-warning-message"></h4>
                <input type="hidden" id="delete-id-laminasi">
                <div style="margin-top: 5rem; text-align: center">
                    <button type="button" class="btn btn-danger" id="btn-delete-laminasi">Hapus</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                </div>
            </div>
        </div>
    </div>
</div>
