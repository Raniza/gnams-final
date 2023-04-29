@extends('app.app')

@section('content')
<!-- Main content -->

<div class="row">
    <div class="col-12">
        <!-- Default box -->
        <div class="card">
            <div class="overlay" style="display: none;">
                <img style="margin-left: auto; margin-right: auto; display: block; padding-top: 75px;" src="{{  asset('loading.gif') }}" alt="">
            </div>
            <div class="card-header">
                <h3 class="card-title">Horensou - All</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col mb-3">
                        <a href="{{ route('horensou.request.create') }}" class="text-white"><button type="button" class="btn btn-sm btn-primary">+ Tambah Data</button></a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table horensou-datatable text-nowrap">
                        <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">No Doc</th>
                                <th>Point Problem</th>
                                <th class="text-center">Part Name</th>
                                <th class="text-center">Kategori</th>
                                <th>Prioritas</th>
                                <th>Requestor</th>
                                <th>Aprrover</th>
                                <th class="text-center">Shop Status</th>
                                <!-- <th class="text-center">Action</th> -->
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>
<!-- /.content -->
@endsection