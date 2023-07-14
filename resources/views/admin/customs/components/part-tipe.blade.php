<h4 class="section-title">Tipe {{ ucfirst($typeName) }}</h4>
<div style="display: flex; align-items: center; gap: 2rem;">
    <select class="form-control" style="max-width: 400px" id="select-tipe-{{ $typeName }}">
    </select>
    <button class="btn btn-primary" data-toggle="modal" data-target="#modal-add-{{ $typeName }}">
        <i class="fas fa-plus"></i>&nbsp;&nbsp; Tipe {{ $typeName }}
    </button>
</div>
<br>
<div id="btn-action-tipe" style="display: flex; align-items: center; gap: 1rem; visibility: hidden;">
    <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modal-update-{{ $typeName }}">
        <i class="fas fa-pen"></i>&nbsp;&nbsp; Ubah <span class="tipe-nama"></span>
    </button>
    <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-delete-{{ $typeName }}">
        <i class="fas fa-trash-alt"></i>&nbsp;&nbsp; Hapus <span class="tipe-nama"></span>
    </button>
</div>

{{-- Modals --}}
<div class="modal fade" id="modal-add-{{ $typeName }}" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="padding-top: 7px; padding-bottom: 7px;">
                <h5 style="font-weight: 500; font-size: 18px">Tambah Tipe {{ ucfirst($typeName) }}</h5>
            </div>
            <div class="modal-body">
                <h5>Tipe</h5>
                <input id="add-tipe_{{ $typeName }}" type="text" class="form-control">
                <br>
            </div>
            <div class="modal-footer">
                <button id="submit-add-{{ $typeName }}" type="submit" class="btn btn-primary">Tambahkan</button>
                <button type="button" id="modal-tambah-close" class="btn btn-default"
                    data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-update-{{ $typeName }}" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="padding-top: 7px; padding-bottom: 7px;">
                <h5 style="font-weight: 500; font-size: 18px">Ubah Tipe {{ ucfirst($typeName) }}</h5>
            </div>
            <div class="modal-body">
                <input type="hidden" id="update-id-{{ $typeName }}">

                <h5>Tipe</h5>
                <input id="update-tipe_{{ $typeName }}" type="text" class="form-control">
                <br>
            </div>
            <div class="modal-footer">
                <button id="submit-update-{{ $typeName }}" type="submit" class="btn btn-primary">Simpan
                    perubahan</button>
                <button type="button" id="modal-tambah-close" class="btn btn-default"
                    data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-delete-{{ $typeName }}" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h4 class="text-center" style="margin-top: 3rem" id="delete-{{ $typeName }}-warning-message">
                </h4>
                <input type="hidden" id="delete-id-{{ $typeName }}">
                <div style="margin-top: 5rem; text-align: center">
                    <button type="button" class="btn btn-danger" id="btn-delete-{{ $typeName }}">Hapus</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                </div>
            </div>
        </div>
    </div>
</div>
