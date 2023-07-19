  @extends('layouts.main')

  @section('main-contents')
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
          <!-- Content Header (Page header) -->
          <div class="content-header">
              <div class="container-fluid">
                  <div class="row mb-2">
                      <div class="col-sm-6">
                          <h1 class="m-0">Dashboard</h1>
                      </div><!-- /.col -->
                      <div class="col-sm-6">
                          <ol class="breadcrumb float-sm-right">
                              <li class="breadcrumb-item"><a href="#">Home</a></li>
                              <li class="breadcrumb-item active">Dashboard</li>
                          </ol>
                      </div><!-- /.col -->
                  </div><!-- /.row -->
              </div><!-- /.container-fluid -->
          </div>
          <!-- /.content-header -->

          <!-- Main content -->
          <section class="content">
              <div class="container-fluid">

                  @can('admin')
                      @php
                          $countMhs = App\Models\User::where('level', 'mahasiswa')
                              ->get()
                              ->count();
                          $countProposal = App\Models\Skripsi::where('file_proposal', '!=', null)
                              ->get()
                              ->count();
                          $countHasil = App\Models\Skripsi::where('file_hasil', '!=', null)
                              ->get()
                              ->count();
                          $countSkripsi = App\Models\Skripsi::where('file_skripsi', '!=', null)
                              ->get()
                              ->count();
                      @endphp

                      <div class="row">
                          <div class="col-lg-3 col-6">
                              <!-- small box -->
                              <div class="small-box bg-info">
                                  <div class="inner">
                                      <h3>{{ $countMhs }}</h3>

                                      <p>Mahasiswa</p>
                                  </div>
                                  <div class="icon">
                                      <i class="ion ion-bag"></i>
                                  </div>
                                  <a href="{{ url('tabel-skripsi') }}" class="small-box-footer">More info <i
                                          class="fas fa-arrow-circle-right"></i></a>
                              </div>
                          </div>
                          <!-- ./col -->
                          <div class="col-lg-3 col-6">
                              <!-- small box -->
                              <div class="small-box bg-danger">
                                  <div class="inner">
                                      <h3>{{ $countProposal }}</h3>

                                      <p>File Proposal</p>
                                  </div>
                                  <div class="icon">
                                      <i class="ion ion-android-checkmark-circle"></i>
                                  </div>
                                  <a href="{{ url('tabel-skripsi') }}" class="small-box-footer">More info
                                      <i class="fas fa-arrow-circle-right"></i></a>
                              </div>
                          </div>
                          <!-- ./col -->
                          <div class="col-lg-3 col-6">
                              <!-- small box -->
                              <div class="small-box bg-warning">
                                  <div class="inner">
                                      <h3>{{ $countHasil }}</h3>

                                      <p>File Hasil</p>
                                  </div>
                                  <div class="icon">
                                      <i class="ion ion-person-add"></i>
                                  </div>
                                  <a href="{{ url('tabel-skripsi') }}" class="small-box-footer">More info
                                      <i class="fas fa-arrow-circle-right"></i></a>
                              </div>
                          </div>
                          <!-- ./col -->
                          <div class="col-lg-3 col-6">
                              <!-- small box -->
                              <div class="small-box bg-success">
                                  <div class="inner">
                                      <h3>{{ $countSkripsi }}</h3>

                                      <p>File Skripsi</p>
                                  </div>
                                  <div class="icon">
                                      <i class="ion ion-pie-graph"></i>
                                  </div>
                                  <a href="{{ url('tabel-skripsi') }}" class="small-box-footer">More info
                                      <i class="fas fa-arrow-circle-right"></i></a>
                              </div>
                          </div>
                          <!-- ./col -->
                      </div>
                  @endcan

                  @can('dosen')
                      @php
                          $countMhs = App\Models\Skripsi::where('pembimbing1_id', auth()->user()->id)
                              ->orWhere('pembimbing2_id', auth()->user()->id)
                              ->get()
                              ->count();
                      @endphp

                      <div class="row">
                          <div class="col-lg-12 col-6">
                              <!-- small box -->
                              <div class="small-box bg-info">
                                  <div class="inner">
                                      <h3>{{ $countMhs }}</h3>

                                      <p>Mahasiswa Bimbingan Saya</p>
                                  </div>
                                  <div class="icon">
                                      <i class="ion ion-bag"></i>
                                  </div>
                                  <a href="{{ url('tabel-skripsi') }}" class="small-box-footer">More info <i
                                          class="fas fa-arrow-circle-right"></i></a>
                              </div>
                          </div>
                      </div>
                  @endcan

                  @can('mahasiswa')
                      <div class="row">
                          <div class="col-lg-12 col-6">
                              <!-- small box -->
                              <div class="small-box bg-info">
                                  <div class="inner">
                                      <h3>SELAMAT DATANG {{ strtoupper(auth()->user()->nama) }}</h3>

                                      <p>{{ strtoupper(auth()->user()->username) }}</p>
                                  </div>
                                  <div class="icon">
                                      <i class="ion ion-bag"></i>
                                  </div>
                                  <a href="{{ url('timeline') }}" class="small-box-footer">More info <i
                                          class="fas fa-arrow-circle-right"></i></a>
                              </div>
                          </div>
                      </div>
                  @endcan
          </section>
          <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
  @endsection
