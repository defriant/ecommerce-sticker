@extends('layouts.admin_ui')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <h3 class="page-title">General</h3>
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-headline">
                        <div class="panel-body">
                            <br>
                            <div>
                                <p>Harga upload desain</p>
                                <div class="input-group" style="width: 400px">
                                    <span class="input-group-addon">Rp</span>
                                    <input class="form-control input-number" type="text" id="general-upload_desain">
                                </div>
                                <br>
                                <p>Harga sticker (panjang)</p>
                                <div class="input-group" style="width: 400px">
                                    <span class="input-group-addon">Rp</span>
                                    <input class="form-control input-number" type="text" id="general-sticker_panjang">
                                    <span class="input-group-addon">/cm</span>
                                </div>
                                <br>
                                <p>Harga sticker (lebar)</p>
                                <div class="input-group" style="width: 400px">
                                    <span class="input-group-addon">Rp</span>
                                    <input class="form-control input-number" type="text" id="general-sticker_lebar">
                                    <span class="input-group-addon">/cm</span>
                                </div>
                            </div>
                            <br>
                            <br>
                            <button type="button" class="btn btn-primary" id="btn-save-general">Simpan</button>
                        </div>
                        <br>
                    </div>
                </div>

                <div class="col-md-6">
                    @include('admin.customs.components.general-bahan')
                </div>

                <div class="col-md-6">
                    @include('admin.customs.components.general-laminasi')
                </div>
            </div>
        </div>
    </div>
@endsection
