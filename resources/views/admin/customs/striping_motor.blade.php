@extends('layouts.admin_ui')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <h3 class="page-title">Striping Motor</h3>
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-headline">
                        <div class="panel-body">
                            @include('admin.customs.components.part-tipe', ['typeName' => 'motor'])

                            <br>
                            <hr style="margin: 0">
                            <br>

                            @include('admin.customs.components.part-section', [
                                'sectionName' => 'spakbor_depan',
                            ])

                            <br>
                            <hr style="margin: 0">
                            <br>

                            @include('admin.customs.components.part-section', [
                                'sectionName' => 'covershock',
                            ])

                            <br>
                            <hr style="margin: 0">
                            <br>

                            @include('admin.customs.components.part-section', [
                                'sectionName' => 'batok_kepala',
                            ])

                            <br>
                            <hr style="margin: 0">
                            <br>

                            @include('admin.customs.components.part-section', [
                                'sectionName' => 'body_depan',
                            ])

                            <br>
                            <hr style="margin: 0">
                            <br>

                            @include('admin.customs.components.part-section', [
                                'sectionName' => 'sayap',
                            ])

                            <br>
                            <hr style="margin: 0">
                            <br>

                            @include('admin.customs.components.part-section', [
                                'sectionName' => 'body_samping',
                            ])

                            <br>
                            <hr style="margin: 0">
                            <br>

                            @include('admin.customs.components.part-section', [
                                'sectionName' => 'arm',
                            ])

                            <br>
                            <hr style="margin: 0">
                            <br>

                            @include('admin.customs.components.part-section', [
                                'sectionName' => 'spakbor_belakang',
                            ])

                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
@endsection

@section('custom_script')
    <script>
        initiateCustomScript({
            tipe: 'striping_motor',
            nama: 'motor',
            sections: [
                'spakbor_depan',
                'covershock',
                'batok_kepala',
                'body_depan',
                'sayap',
                'body_samping',
                'arm',
                'spakbor_belakang'
            ],
        });
    </script>
@endsection
