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


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
