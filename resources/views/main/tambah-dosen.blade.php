<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('main-assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('main-assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('main-assets/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="main-assets/dist/css/regist.css">
</head>

<body class="hold-transition login-page">
<section class="content" >
<div class="container">
    <form class="form">
      <h2>Tambah Dosen</h2>
      <div class="form-group">
        <label for="nama">Nama Lengkap</label>
        <input type="text" id="nama" name="nama" placeholder="Masukkan nama lengkap user" required>
      </div>
      <div class="form-group">
        <label for="nip">NIP</label>
        <input type="text" id="nip" name="nip" placeholder="Masukkan NIP user" required>
      </div>
      <div class="form-group">
        <label for="email">E-mail</label>
        <input type="email" id="email" name="email" placeholder="Masukkan email user" required>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Masukkan password user" required>
      </div>
      <div class="form-actions">
        <button type="submit">Submit</button>
        <button type="button" onclick="window.history.back()">Kembali</button>
      </div>
    </form>
  </div>
</section>

    <!-- jQuery -->
    <script src="{{ asset('main-assets/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('main-assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('main-assets/dist/js/adminlte.js') }}"></script>
</body>
