@extends('layouts.admin_ui')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
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
