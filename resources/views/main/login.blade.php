<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    {{-- <meta name="viewport" content="width=device-width, initial-scale=1"> --}}
    <title>Log in</title>

    <!-- Google Font: Source Sans Pro -->
    {{-- <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"> --}}
    <!-- Font Awesome -->
    {{-- <link rel="stylesheet" href="{{ asset('main-assets') }}/plugins/fontawesome-free/css/all.min.css"> --}}
    <!-- icheck bootstrap -->
    {{-- <link rel="stylesheet" href="{{ asset('main-assets') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css"> --}}
    <!-- Theme style -->
    {{-- <link rel="stylesheet" href="{{ asset('main-assets') }}/dist/css/adminlte.min.css"> --}}
    {{-- <img src="{{ asset('main-assets/dist/img/logo-uho.png') }}" alt="Logo"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('css/login.css') }}"> --}}

    <style>
        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            height: 100%;
        }

        .left-side {
            background-color: #787878;
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .logo {
            text-align: center;
            margin-bottom: 10px;
        }

        .logo img {
            width: 170px;
            height: 170px;
        }

        .app-name {
            text-align: center;
            font-size: 24px;
            font-family: Arial, Helvetica, sans-serif;
            font-weight: bold;
            color: #fff;
        }

        .right-side {
            background-color: #f4f4f4;
            font-family: Arial, Helvetica, sans-serif;
            flex: 1;
            /* display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center; */
            padding: 20px;
        }

        .header-form {
            margin-top: 50px;
            margin-left: 50px;

        }

        .universitas-name {
            color: #fff;
            font-family: Arial, Helvetica, sans-serif;
            text-align: center;
            font-size: 28px;
            font-weight: bold;
        }

        .login-form {
            margin-left: 50px;
            max-width: 700px;
            margin-top: 100px;
        }

        .form-group {
            margin-bottom: 10px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .form-group label[for="password"] {
            font-family: Arial, Helvetica, sans-serif;
            display: block;
            font-weight: bold;
            margin-top: 30px;
        }

        .form-group input[type="text"] {
            width: 50%;
            padding: 10px;
            font-family: Arial, Helvetica, sans-serif;
            background-color: rgb(242, 242, 242);
            border-radius: 10px;
        }

        .form-group input[type="password"] {
            width: 50%;
            padding: 10px;
            font-family: Arial, Helvetica, sans-serif;
            background-color: rgb(242, 242, 242);
            border-radius: 10px;
        }


        .form-group input[type="submit"] {
            width: 54%;
            padding: 15px;
            background-color: #1111ff;
            color: #fff;
            border: none;
            font-size: 20px;
            font-family: Arial, Helvetica, sans-serif;
            cursor: pointer;
            border-radius: 30px;
            margin-top: 30px;
        }

        /* Responsiveness for small screens */
        @media screen and (max-width: 600px) {
            .container {
                flex-direction: column;
            }

            .left-side,
            .right-side {
                flex: 1;
            }

            .form-group input[type="text"] {
                width: 80%;
                padding: 7px;
                font-family: Arial, Helvetica, sans-serif;
                background-color: rgb(242, 242, 242);
                border-radius: 10px;
            }

            .form-group input[type="password"] {
                width: 80%;
                padding: 7px;
                font-family: Arial, Helvetica, sans-serif;
                background-color: rgb(242, 242, 242);
                border-radius: 10px;
            }


            .form-group input[type="submit"] {
                width: 80%;
                padding: 12px;
                background-color: #1111ff;
                color: #fff;
                border: none;
                font-size: 20px;
                font-family: Arial, Helvetica, sans-serif;
                cursor: pointer;
                border-radius: 30px;
                margin-top: 30px;
            }
        }

        /* Responsiveness for extra small screens */
        @media screen and (max-width: 400px) {
            .container {
                flex-direction: row;
            }

            .left-side,
            .right-side {
                flex: none;
                width: 100%;
            }

            .left-side {
                height: 200px;
            }

            .right-side {
                padding-top: 20px;
            }
        }

        .login-form label[for="daftar"] {
            font-weight: lighter;
            padding: 10px;
            margin-top: 10px;
            display: flex;
            margin-left: 40px;
        }

        .login-form a {
            margin-left: 10px;
        }

        .daftar {
            margin-left: 20%
        }
    </style>
</head>

<body class="hold-transition login-page">
    <div class="container">
        <div class="left-side">
            <div class="logo">
                <img src="{{ asset('img/uho.png') }}" alt="Logo">
            </div>
            <div class="app-name">
                TEKNIK INFORMATIKA
            </div>
            <div class="universitas-name">
                UHO
            </div>
        </div>

        {{-- Alert --}}
        {{-- @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif --}}

        {{-- @error('username')
            <p class="text-danger text-center">{{ $message }}</p>
        @enderror --}}

        <!-- /.login-logo -->
        <div class="right-side">
            <div class="header-form">
                <h1>Login SIMTAR</h1>
                <h4>SISTEM MONITORING TUGAS AKHIR</h4>
            </div>

            <div class="login-form">
                <form action="{{ url('login') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" class="form-control" placeholder="Username" name="username" required
                            value="{{ old('username') }}">


                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" placeholder="Password" name="password" required>
                        {{-- <div class="input-group-append">
                    <div class="input-group-text">
                        {{-- <span class="fas fa-lock"></span> --}}

                    </div>
                    {{-- <div class="row"> --}}
                    {{-- <div class="col-8">
                    <div class="icheck-primary">
                        <input type="checkbox" id="remember">
                        <label for="remember">
                            Remember Me
                        </label>
                    </div>
                </div> --}}
                    <!-- /.col -->
                    <div class="form-group">
                        {{-- <div class="col-4"> --}}
                        <input type="submit" value="Login">
                        {{-- <button type="submit" class="btn btn-primary btn-block">Login</button> --}}
                        {{-- </div> --}}
                    </div>
                    <!-- /.col -->
                </form>
            </div>

            @if (request()->is('login'))
                <div class="daftar">
                    <p class="mb-0 mt-3">
                        <a href="{{ url('register') }}" class="text-center">Register akun mahasiswa</a>
                    </p>
                </div>
            @endif
        </div>
        <!-- /.login-card-body -->
    </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="{{ asset('main-assets') }}/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('main-assets') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    {{-- <script src="{{ asset('main-assets') }}/dist/js/adminlte.min.js"></script> --}}
    </div>
</body>

</html>
