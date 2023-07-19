@extends('layouts.main')

@section('main-contents')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h1>Tambah User</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Tambah User</li>
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
                        <a href="{{ url('data-mahasiswa') }}" class="btn btn-secondary my-2">Kembali</a>

                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {!! session('success') !!}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        <div class="card">
                            <div class="card-body">
                                <form action="{{ url('data-mahasiswa/store') }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name">Nama Lengkap</label>
                                                <input type="name" class="form-control" id="name"
                                                    placeholder="Enter name" name="name" value="{{ old('name') }}">
                                                @error('name')
                                                    <small id="name"
                                                        class="form-text text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email">Alamat E-mail</label>
                                                <input type="email" class="form-control" id="email"
                                                    placeholder="Enter email" name="email" value="{{ old('email') }}">
                                                @error('email')
                                                    <small id="email"
                                                        class="form-text text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="user_type">Level</label>
                                                <select class="custom-select" name="user_type">
                                                    <option value="">Select menu</option>
                                                    <option value="admin"
                                                        @if (old('user_type') == 'admin') selected @endif>Admin</option>
                                                    <option value="dosen"
                                                        @if (old('user_type') == 'dosen') selected @endif>Dosen</option>
                                                    <option value="mahasiswa"
                                                        @if (old('user_type') == 'mahasiswa') selected @endif>Mahasiswa</option>
                                                </select>
                                                @error('user_type')
                                                    <small id="user_type"
                                                        class="form-text text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="id">NIM / NIP</label>
                                                <input type="text" class="form-control" id="id"
                                                    placeholder="Enter NIM / NIP" name="id" maxlength="18"
                                                    value="{{ old('id') }}">
                                                @error('id')
                                                    <small id="id"
                                                        class="form-text text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <input type="password" class="form-control" id="password"
                                                    placeholder="Enter password" name="password">
                                                @error('password')
                                                    <small id="password"
                                                        class="form-text text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="password_confirmation">Konfirmasi Password</label>
                                                <input type="password" class="form-control" id="password_confirmation"
                                                    placeholder="Enter password confirmation" name="password_confirmation">
                                                @error('password_confirmation')
                                                    <small id="password_confirmation"
                                                        class="form-text text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <button type="reset" class="btn btn-danger">Reset</button>
                                </form>
                            </div>
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
@endsection
