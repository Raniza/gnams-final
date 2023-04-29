<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('plugin/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugin/adminLTE/css/adminlte.min.css') }}">
    @if (request()->routeIs('horensou.request.create'))<link rel="stylesheet" href="{{ asset('plugin/summernote/summernote-bs4.min.css') }}">@endif
    
    <link rel="stylesheet" href="{{ asset('plugin/DataTables/datatables.min.css') }}">
    <link rel="shortcut icon" href="{{ asset('gnams.png') }}" type="image/x-icon">
    <title>GNA</title>
</head>
<body class="hold-transition sidebar-mini sidebar-collapse">

<div class="wrapper">
    <div id="loadingImg" class="overlay col-12" style="display: none; position: absolute; z-index: 1; height: 100%; background-color: rgba(0,0,0,0.1); padding-top: 150px">
        <img style="margin-left: auto; margin-right: auto; display: block; padding-top: 75px;" src="{{  asset('loading.gif') }}" alt="">
    </div>
    @include('app.partial.navbar')
    @include('app.partial.sidebar')
    
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="min-height: 1761.5px;">
    <section class="content-header"></section>
    <section class="content mt-3">
        <a id="back-to-top" href="#" class="btn btn-primary back-to-top btn-sm" role="button" aria-label="Scroll to top">
            <i class="fas fa-chevron-up"></i>
        </a>
        
        <div class="container-fluid">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-check"></i> Success Alert!</h5>
                        {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-ban"></i> Error Alert!</h5>
                        {{ session('error') }}
                </div>
            @endif
            @if (session('warning'))
                <div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-ban"></i> Warning Alert!</h5>
                        {{ session('warning') }}
                </div>
            @endif
            @yield('content')
        </div>
    </section>
        
    </div>
    <!-- /.content-wrapper -->

    @include('app.partial.footer')

    
<div id="sidebar-overlay"></div></div>

    <script src="{{ asset('plugin/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('plugin/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('plugin/adminLTE/js/adminlte.min.js') }}"></script>
    @if (request()->routeIs('horensou.request.create'))<script src="{{ asset('plugin/summernote/summernote-bs4.min.js') }}"></script>@endif
    <script src="{{ asset('plugin/DataTables/datatables.min.js') }}"></script>
    <script>
        const alertMsg = document.querySelector('.alert')
        $(function () {
            $('[data-toggle="tooltip"]').tooltip();
            $(document).on( 'init.dt', function () {
                $('[data-toggle="tooltip"]').tooltip();
            } );
            
            // Summernote
            @if (request()->routeIs('horensou.request.create'))
                $('#detailProblem').summernote({
                    toolbar: [
                        ['fontsize', ['fontsize']],
                        ['fontname', ['fontname']],
                        ['color', ['color']],
                        ['style', ['bold', 'italic', 'underline', 'clear']],
                        ['font', ['strikethrough', 'superscript', 'subscript']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        // ['codeview', ['codeview']]
                    ]
                });
            @endif

            @if (request()->routeIs('user.index'))
                let userTable = $(".user-datatable").DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('user.index') }}",
                    columns: [
                        { data: "DT_RowIndex", name: "DT_RowIndex", className: "dt-body-center" },
                        { data: "nik", name: "nik", className: "dt-body-center" },
                        { data: "name", name: "name" },
                        { data: "email", name: "email" },
                        { data: "position.position", name: "position.position", className: "dt-body-center" },
                        {
                            data: "department.name",
                            name: "department.name",
                        },
                        { data: "section.name", name: "section.name" },
                        { data: "shop.name", name: "shop.name" },
                        { data: "is_admin", name: "is_admin", className: "dt-body-center"},
                        // {
                        //     data: "action",
                        //     name: "action",
                        //     orderable: false,
                        //     searchable: false,
                        //     className: "dt-body-center",
                        // },
                    ],
                    pageLength: 25,
                })
            @endif

            @if (request()->routeIs('horensou.request.index'))
                let horensouTable = $(".horensou-datatable").DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('horensou.datatable') }}",
                    columns: [
                        { data: "DT_RowIndex", name: "DT_RowIndex", className: "dt-body-center" },
                        { data: "doc_no", name: "doc_no", className: "dt-body-center" },
                        { data: "point_problem", name: "point_problem" },
                        { data: "part_name", name: "part_name", className: "dt-body-center" },
                        { data: "category.name", name: "category.name", className: "dt-body-center" },
                        { data: "priority_id", name: "priority"},
                        { data: "request_by", name: "request_by" },
                        { data: "approve_by.name", name: "approve_by.name" },
                        { data: "shop_status", name: "shop_status", className: "dt-body-center" },
                    ],
                    pageLength: 25,
                })
            @endif
            
            if (alertMsg) {
                setTimeout(() => {
                    alertMsg.style.display = 'none'
                }, 5000);
            }
        })
    </script>
</body>
</html>