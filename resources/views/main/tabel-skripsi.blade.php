@extends('layouts.main')

@section('main-contents')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h1>Data Ujian Skripsi</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Data Ujian Skripsi</li>
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

                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {!! session('success') !!}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Daftar Mahasiswa Yang Menyusun Tugas Akhir.</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-sm table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Aksi</th>
                                            <th>NIM</th>
                                            <th>Nama Lengkap</th>
                                            <th>Judul</th>
                                            <th>Pembimbing 1</th>
                                            <th>Pembimbing 2</th>
                                            <th>Progress</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Tanggal Ujian</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($data as $skripsi)
                                            {{-- Modal download file --}}
                                            <div class="modal fade" id="modalFile{{ $skripsi->id }}" tabindex="-1"
                                                role="dialog">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Download File
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-4 text-center">
                                                                    @if ($skripsi->file_proposal == null)
                                                                        <button disabled
                                                                            class="btn btn-danger btn-block">Proposal</button>
                                                                        <small>Belum ada</small>
                                                                    @else
                                                                        <form
                                                                            action="{{ url("download-file-proposal/$skripsi->id") }}"
                                                                            method="post">
                                                                            @csrf
                                                                            <button
                                                                                class="btn btn-danger btn-block">Proposal</button>
                                                                        </form>
                                                                    @endif
                                                                </div>
                                                                <div class="col-md-4 text-center">
                                                                    @if ($skripsi->file_hasil == null)
                                                                        <button disabled
                                                                            class="btn btn-info btn-block">Hasil</button>
                                                                        <small>Belum ada</small>
                                                                    @else
                                                                        <form
                                                                            action="{{ url("download-file-hasil/$skripsi->id") }}"
                                                                            method="post">
                                                                            @csrf
                                                                            <button
                                                                                class="btn btn-info btn-block">Hasil</button>
                                                                        </form>
                                                                    @endif
                                                                </div>
                                                                <div class="col-md-4 text-center">
                                                                    @if ($skripsi->file_skripsi == null)
                                                                        <button disabled
                                                                            class="btn btn-success btn-block">Skripsi</button>
                                                                        <small>Belum ada</small>
                                                                    @else
                                                                        <form
                                                                            action="{{ url("download-file-skripsi/$skripsi->id") }}"
                                                                            method="post">
                                                                            @csrf
                                                                            <button
                                                                                class="btn btn-success btn-block">Skripsi</button>
                                                                        </form>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Kembali</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <button class="btn btn-primary btn-sm badge" data-toggle="modal"
                                                        data-target="#modalFile{{ $skripsi->id }}">
                                                        <i class="fas fa-folder"></i> Lihat File
                                                    </button>
                                                </td>
                                                <td>{{ strtoupper($skripsi->mahasiswa->username) }}</td>
                                                <td>{{ $skripsi->mahasiswa->nama }}</td>
                                                <td>{{ $skripsi->judul }}</td>
                                                <td>{{ $skripsi->pembimbing_1->nama }}</td>
                                                <td>{{ $skripsi->pembimbing_2->nama }}</td>
                                                <td>
                                                    @php
                                                        if (($skripsi->file_skripsi && $skripsi->file_hasil && $skripsi->file_proposal) != null) {
                                                            $progress = '100%';
                                                            $bgProgress = 'success';
                                                        } elseif (($skripsi->file_hasil && $skripsi->file_proposal) != null) {
                                                            $progress = '66.66%';
                                                            $bgProgress = 'primary';
                                                        } elseif ($skripsi->file_proposal != null) {
                                                            $progress = '33.33%';
                                                            $bgProgress = 'warning';
                                                        } else {
                                                            $progress = '10%';
                                                            $bgProgress = 'secondary';
                                                        }
                                                    @endphp
                                                    <div class="progress progress-xs">
                                                        <div class="progress-bar bg-{{ $bgProgress }}"
                                                            style="width: {{ $progress }}"></div>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    @if (!is_null($skripsi->file_proposal) && is_null($skripsi->file_hasil) && is_null($skripsi->file_skripsi))
                                                        <span class="badge badge-warning">Proposal</span>
                                                    @elseif (!is_null($skripsi->file_proposal) && !is_null($skripsi->file_hasil) && is_null($skripsi->file_skripsi))
                                                        <span class="badge badge-info">Hasil</span>
                                                    @elseif (!is_null($skripsi->file_proposal) && !is_null($skripsi->file_hasil) && !is_null($skripsi->file_skripsi))
                                                        <span class="badge badge-success">Skripsi</span>
                                                    @else
                                                        <span class="badge badge-secondary">Pengajuan judul</span>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    @php
                                                        $tglUjian = '-';
                                                        if ($skripsi->tgl_ujian_skripsi) {
                                                            $tglUjian = $skripsi->tgl_ujian_skripsi;
                                                        } elseif ($skripsi->tgl_ujian_hasil) {
                                                            $tglUjian = $skripsi->tgl_ujian_hasil;
                                                        } elseif ($skripsi->tgl_ujian_proposal) {
                                                            $tglUjian = $skripsi->tgl_ujian_proposal;
                                                        }
                                                    @endphp
                                                    {{ $tglUjian }}
                                                    {{-- @can('admin')
                                                        <button class="btn btn-info badge d-block mx-auto" data-toggle="modal"
                                                            data-target="#modalTanggal">Edit</button>
                                                    @endcan --}}
                                                </td>

                                                {{-- @can('admin')
                                                    <div class="modal fade" id="modalTanggal" tabindex="-1"
                                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-sm">
                                                            <form
                                                                action="{{ url('tabel-skripsi/tanggal-ujian/update/' . $skripsi->id) }}"
                                                                method="post">
                                                                @csrf
                                                                @method('put')
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Tanggal
                                                                            Ujian
                                                                        </h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">

                                                                        <div class="form-group">
                                                                            <input name="tgl_ujian" type="date"
                                                                                value="{{ old('tgl_ujian', $skripsi->tgl_ujian) }}"
                                                                                class="form-control" id="tgl_ujian" required>
                                                                        </div>

                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">Close</button>
                                                                        <button type="submit"
                                                                            class="btn btn-primary">Simpan</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                @endcan --}}
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="10" class="text-center">Belum ada data skripsi.</td>
                                            </tr>
                                        @endforelse
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
@endsection
