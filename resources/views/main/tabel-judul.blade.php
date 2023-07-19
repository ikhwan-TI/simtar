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

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Data Judul</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Data Judul</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Daftar Mahasiswa yang Telah Diterima Judulnya</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            {{-- <th>Aksi</th> --}}
                                            <th>Nama Mahasiswa</th>
                                            <th>Judul</th>
                                            <th>Pembimbing 1</th>
                                            <th>Pembimbing 2</th>
                                            <th>Progress</th>
                                            <th>Status</th>
                                            <th>Tanggal Submit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @for ($i = 1; $i < 20; $i++)
                                            <tr>
                                                <td>{{ $i }}</td>
                                                {{-- <td> <a class="btn btn-primary btn-sm" href="#">
                                                        <i class="fas fa-check">
                                                        </i>
                                                        Terima
                                                    </a>
                                                    <a class="btn btn-info btn-sm" href="#">
                                                        <i class="fas fa-pencil-alt">
                                                        </i>
                                                        Revisi
                                                    </a>
                                                    <a class="btn btn-danger btn-sm" href="#">
                                                        <i class="fas fa-trash">
                                                        </i>
                                                        Tolak
                                                    </a>
                                                </td> --}}
                                                <td>Andini Septiani</td>
                                                <td>Solusi Pemecahan Masalah Menggunakan Algoritma KNN</td>
                                                <td>Andini Septiani ST</td>
                                                <td>Andini Septiani MT</td>
                                                <td>
                                                    <div class="progress progress-xs">
                                                        <div class="progress-bar bg-danger" style="width: 25%"></div>
                                                    </div>
                                                </td>
                                                <td><span class="badge badge-danger">Judul</span></td>
                                                <td>24-01-2023</td>
                                            </tr>
                                        @endfor
                                    </tbody>

                                </table>
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
