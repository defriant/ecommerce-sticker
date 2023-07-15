<div class="section-header">
    <h4 class="section-title">{{ ucfirst(str_replace('_', ' ', $sectionName)) }}</h4>
    <button class="btn btn-primary" id="btn-trigger-add-{{ $sectionName }}" data-toggle="modal"
        data-target="#modal-add-{{ $sectionName }}" style="display: none">
        <i class="fas fa-plus"></i>&nbsp;&nbsp; Tambah desain
    </button>
</div>
<div class="loader" id="loader-{{ $sectionName }}" hidden>
    <div class="loader4"></div>
    <h5 style="margin-top: 2.5rem">Loading data</h5>
</div>
<div class="loader" id="null-data-{{ $sectionName }}">
    <i class="fas fa-ban" style="font-size: 5rem; opacity: .5"></i>
    <h5 style="margin-top: 2.5rem; opacity: .75">Belum ada data</h5>
</div>
<div class="section-grid" id="list-data-{{ $sectionName }}"></div>

{{-- Modals --}}
<div class="modal fade" id="modal-add-{{ $sectionName }}" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="form-add-{{ $sectionName }}" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="produk-gambar">
                                <div id="add-gambar-preview-{{ $sectionName }}" class="gambar-preview"
                                    style="background-image: url('/user/images/no_image.png')">
                                </div>
                                <input type="button" value="Pilih Gambar" class="gambar-input"
                                    id="add-choose-gambar-{{ $sectionName }}"
                                    style="text-align: center; margin: auto">
                                <input type="file" id="add-gambar-{{ $sectionName }}" name="gambar"
                                    style="display: none;">
                            </div>
                        </div>
                    </div>

                    <div class="produk-detail">
                        <h5>Nama :</h5>
                        <input id="add-nama-{{ $sectionName }}" type="text" name="nama" class="form-control">

                        <br>
                        <h5>Harga :</h5>
                        <div class="input-group">
                            <span class="input-group-addon">Rp.</span>
                            <input id="add-harga-{{ $sectionName }}" type="text" name="harga"
                                class="form-control">
                        </div>
                        <br>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="btn-add-{{ $sectionName }}" type="submit" class="btn btn-primary">Tambahkan</button>
                    <button type="button" id="modal-tambah-close" class="btn btn-default"
                        data-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-update-{{ $sectionName }}" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="form-update-{{ $sectionName }}" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" id="update-id-{{ $sectionName }}" name="id">
                    <div id="update-old-gambar-{{ $sectionName }}"></div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="produk-gambar">
                                <div id="update-gambar-preview-{{ $sectionName }}" class="gambar-preview"
                                    style="background-image: url('/user/images/no_image.png')">
                                </div>
                                <input type="button" value="Pilih Gambar" class="gambar-input"
                                    id="update-choose-gambar-{{ $sectionName }}"
                                    style="text-align: center; margin: auto">
                                <input type="file" id="update-gambar-{{ $sectionName }}" name="gambar"
                                    style="display: none;">
                            </div>
                        </div>
                    </div>

                    <div class="produk-detail">
                        <h5>Nama :</h5>
                        <input id="update-nama-{{ $sectionName }}" type="text" name="nama"
                            class="form-control">

                        <br>
                        <h5>Harga :</h5>
                        <div class="input-group">
                            <span class="input-group-addon">Rp.</span>
                            <input id="update-harga-{{ $sectionName }}" type="text" name="harga"
                                class="form-control">
                        </div>
                        <br>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="btn-update-{{ $sectionName }}" type="submit"
                        class="btn btn-primary">Simpan</button>
                    <button type="button" id="modal-tambah-close" class="btn btn-default"
                        data-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-delete-{{ $sectionName }}" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h4 class="text-center" style="margin-top: 3rem" id="delete-{{ $sectionName }}-warning-message">
                </h4>
                <input type="hidden" id="delete-id-{{ $sectionName }}">
                <div style="margin-top: 5rem; text-align: center">
                    <button type="button" class="btn btn-danger" id="btn-delete-{{ $sectionName }}">Hapus</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                </div>
            </div>
        </div>
    </div>
</div>
