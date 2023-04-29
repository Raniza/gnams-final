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
    <link rel="stylesheet" href="{{ asset('plugin/icheck-bootstrap/icheck-bootstrap.min.css') }}">

    <link rel="shortcut icon" href="{{ asset('gnams.png') }}" type="image/x-icon">
    <title>GNA</title>
</head>
<body class="hold-transition login-page">
    <div class="login-box">
    <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <span class="h1"><b>GNA</b>MS</span>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Sign in to start your session</p>
                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible px-3 py-2" style="font-size: 14px;">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <i class="icon fas fa-ban"></i> Alert! <br>
                        {{ session('error') }}
                    </div>
                @endif
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="input-group @error('nik') mb-1 @else mb-3 @enderror">
                        <input type="text" class="form-control" placeholder="XN01234" name="nik" value="{{ old('nik') }}" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    @error('nik') <span class="text-danger mb-3" style="font-size: 14px;">{{ $message }}</span> @enderror
                    <div class="input-group @error('password') mb-1 @else mb-3 @enderror">
                        <input type="password" class="form-control" placeholder="Password" name="password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    @error('password') <span class="text-danger mb-3" style="font-size: 14px;">{{ $message }}</span> @enderror
                    <button type="submit" class="btn btn-primary btn-block">Sign In</button>                    
                </form>

                <p class="mb-1">
                    <a href="#">Forgot my password</a>
                </p>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <script src="{{ asset('plugin/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('plugin/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('plugin/adminLTE/js/adminlte.min.js') }}"></script>
    
</body>
</html>