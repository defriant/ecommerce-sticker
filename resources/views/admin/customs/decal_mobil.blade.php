@extends('layouts.admin_ui')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <h3 class="page-title">Decal Mobil</h3>
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-headline">
                        <div class="panel-body">
                            @include('admin.customs.components.part-tipe', ['typeName' => 'mobil'])

                            <br>
                            <hr style="margin: 0">
                            <br>

                            @include('admin.customs.components.part-section', [
                                'sectionName' => 'depan',
                            ])

                            <br>
                            <hr style="margin: 0">
                            <br>

                            @include('admin.customs.components.part-section', [
                                'sectionName' => 'samping',
                            ])

                            <br>
                            <hr style="margin: 0">
                            <br>

                            @include('admin.customs.components.part-section', [
                                'sectionName' => 'pintu',
                            ])

                            <br>
                            <hr style="margin: 0">
                            <br>

                            @include('admin.customs.components.part-section', [
                                'sectionName' => 'belakang',
                            ])

                            <br>
                            <hr style="margin: 0">
                            <br>

                            @include('admin.customs.components.part-section', [
                                'sectionName' => 'kaca_depan',
                            ])

                            <br>
                            <hr style="margin: 0">
                            <br>

                            @include('admin.customs.components.part-section', [
                                'sectionName' => 'kaca_belakang',
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
            tipe: 'decal_mobil',
            nama: 'mobil',
            sections: [
                'depan',
                'samping',
                'pintu',
                'belakang',
                'kaca_depan',
                'kaca_belakang',
            ],
        });
    </script>
@endsection
