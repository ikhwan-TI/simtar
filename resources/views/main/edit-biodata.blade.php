@extends('layouts.main')

@section('main-contents')
    {{-- @push('link')
        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('main-assets') }}/plugins/fontawesome-free/css/all.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('main-assets') }}/dist/css/adminlte.min.css">
       
    @endpush --}}
    
    <link rel="stylesheet" href="main-assets/dist/css/form.css">

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Atur Biodata</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Atur biodata</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12 text-center">
						<div class="card" >
						<div class="card-body" >
            
    
<form>
    <div class="form-group">
      <label for="nama">Nama:</label>
      <input type="text" id="nama" name="nama" placeholder="Masukkan Nama">
    </div>
    <div class="form-group">
      <label for="nim">NIP:</label>
      <input type="text" id="nim" name="nim" placeholder="Masukkan NIM">
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" placeholder="Masukkan E-mail">
    </div>
    <div class="form-group">
      <label for="password">Password:</label>
      <input type="password" id="password" name="password" placeholder="Masukkan Password">
    </div>
    
    <div class="form-group">
      <button type="submit">Submit</button>
    </div>
  </form>
</div>
</div>
</div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

    {{-- @push('script')
        <!-- jQuery -->
        <script src="{{ asset('main-asset/plugins/jquery/jquery.min.js') }}"></script>
        <!-- Bootstrap 4 -->
        <script src="{{ asset('main-asset/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <!-- DataTables  & Plugins -->
        <script src="{{ asset('main-assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('main-assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('main-assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('main-assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('main-assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('main-assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('main-assets/plugins/jszip/jszip.min.js') }}"></script>
        <script src="{{ asset('main-assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
        <script src="{{ asset('main-assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
        <script src="{{ asset('main-assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
        <script src="{{ asset('main-assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
        <script src="{{ asset('main-assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('main-asset/dist/js/adminlte.min.js') }}"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="{{ asset('main-asset/dist/js/demo.js') }}"></script>
        <!-- Page specific script -->
        
    @endpush --}}
@endsection
