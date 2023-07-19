@extends('layouts.main')

@section('main-contents')
    <div class="content-wrapper">


        @if (session('success'))
            <div class="alert alert-success position-absolute" id="notif" role="alert">
                {{ session('success') }}
            </div>

            <script>
                window.onload = function() {
                    $("#notif").css("transform", "translateX(0)");

                    setTimeout(function() {
                        $("#notif").css("transform", "translateX(-300px)");
                    }, 2500);
                };
            </script>
        @endif

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">

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
                <div class="row justify-content-center">
                    <div class="col-12 text-center">
                        <div class="card">
                            <div class="card-body">
                                <link rel="stylesheet" href="{{ asset('main-assets/css/timeline.css') }}">
                                @php
                                    $cekFile = App\Models\Skripsi::where('mhs_id', auth()->user()->id)
                                        ->get()
                                        ->first();
                                @endphp

                                <h1 style="margin-bottom: 100px;">TIMELINE PROGRES</h1>
                                <div class="process-wrapper">
                                    <div id="progress-bar-container">
                                        <ul>
                                            @php
                                                // $activeJudul = false;
                                                $activeProposal = false;
                                                $activeHasil = false;
                                                $activeSkripsi = false;
                                                if (isset($skripsiMhs)) {
                                                    if (!is_null($skripsiMhs->tgl_judul)) {
                                                        $activeProposal = true;
                                                    }
                                                    if (!is_null($skripsiMhs->file_proposal)) {
                                                        $activeHasil = true;
                                                    }
                                                    if (!is_null($skripsiMhs->file_hasil)) {
                                                        $activeSkripsi = true;
                                                    }
                                                }
                                            @endphp

                                            <li class="step01 @if ($activeProposal) active @endif">
                                                <div class="step-inner">pengajuan judul</div>
                                            </li>
                                            <li class="step02 @if ($activeProposal) active @endif">
                                                <div class="step-inner">proposal</div>
                                            </li>
                                            <li class="step03 @if ($activeProposal && $activeHasil) active @endif">
                                                <div class="step-inner">hasil</div>
                                            </li>
                                            <li class="step04 @if ($activeProposal && $activeHasil && $activeSkripsi) active @endif">
                                                <div class="step-inner">skripsi</div>
                                            </li>
                                        </ul>

                                        <div id="line">
                                            <div id="line-progress"></div>
                                        </div>
                                    </div>

                                    {{-- <ul>
                                        <li>proposal : {{ $activeProposal ? $activeProposal : '0' }}</li>
                                        <li>hasil : {{ $activeHasil ? $activeHasil : '0' }}</li>
                                        <li>skripsi : {{ $activeSkripsi ? $activeSkripsi : '0' }}</li>
                                    </ul> --}}

                                    <div id="progress-content-section">
                                        <div class="section-content discovery active">
                                            {{-- form pengajuan judul --}}
                                            <form action="{{ url('pengajuan-judul') }}" method="post">
                                                @csrf
                                                <div class="mb-4">
                                                    <h6>Judul Tugas Akhir</h6>
                                                    @if (isset($skripsiMhs))
                                                        <textarea name="judul" cols="90" rows="4" required>{{ $skripsiMhs->judul }}</textarea>
                                                    @else
                                                        <textarea name="judul" cols="90" rows="4" required></textarea>
                                                    @endif
                                                </div>
                                                <div class="select-wrapper">
                                                    <select name="dosen1" id="combo-1" class="select" required>
                                                        <option value="">Dosen Pembimbing 1</option>
                                                        @forelse ($dosen as $item)
                                                            <option @if ($item->id == old('dosen1', isset($skripsiMhs) ? $skripsiMhs->pembimbing1_id : null)) selected @endif
                                                                value="{{ $item->id }}">{{ $item->nama }}
                                                            </option>
                                                        @empty
                                                            <option value="">Belum ada data dosen</option>
                                                        @endforelse
                                                    </select>
                                                    <span class="select-icon">
                                                        <i class="fa fa-chevron-down"></i>
                                                    </span>
                                                </div>
                                                <div class="select-wrapper">
                                                    <select name="dosen2" id="combo-2" class="select" required>
                                                        <option value="">Dosen Pembimbing 2</option>
                                                        @forelse ($dosen as $item)
                                                            <option @if ($item->id == old('dosenw', isset($skripsiMhs) ? $skripsiMhs->pembimbing2_id : null)) selected @endif
                                                                value="{{ $item->id }}">{{ $item->nama }}
                                                            </option>
                                                        @empty
                                                            <option value="">Belum ada data dosen</option>
                                                        @endforelse
                                                    </select>
                                                    <span class="select-icon">
                                                        <i class="fa fa-chevron-down"></i>
                                                    </span>
                                                </div>
                                                <div>
                                                    <button type="submit"
                                                        class="upload-btn mt-3 @if (isset($skripsiMhs)) @if ($skripsiMhs->tgl_judul) success @endif @endif">SIMPAN</button>
                                                </div>
                                            </form>
                                            {{-- end form pengajuan judul --}}
                                        </div>

                                        <div class="section-content strategy">
                                            {{-- form upload proposal --}}
                                            <form action="{{ url('upload-file-proposal') }}" enctype="multipart/form-data"
                                                method="post">
                                                @csrf
                                                <div class="mb-4">
                                                    <h6>Judul Tugas Akhir</h6>
                                                    @if (isset($skripsiMhs))
                                                        <div class="mt-3 pt-3 pb-2 w-75 mx-auto"
                                                            style="background: #eaeaea; border: 2px solid rgb(211, 211, 211)">
                                                            <h6 class="font-weight-bold">{{ $skripsiMhs->judul }}</h6>
                                                        </div>
                                                    @else
                                                        <div class="mt-3 pt-3 pb-2"
                                                            style="background: #eaeaea; border: 2px solid rgb(211, 211, 211)">
                                                            <h5>Belum ada judul.</h5>
                                                        </div>
                                                    @endif
                                                </div>

                                                <h2>
                                                    <label for="upload-file"
                                                        class="upload-btn @if (isset($skripsiMhs)) @if ($skripsiMhs->file_proposal) success @endif @endif">
                                                        UPLOAD FILE PROPOSAL
                                                    </label>
                                                    <input type="file" id="upload-file" class="upload-input"
                                                        name="file_proposal"
                                                        @if (isset($skripsiMhs)) @required(!$skripsiMhs->file_proposal) @endif />

                                                    {{-- Tanggal Ujian --}}
                                                    <button type="button"
                                                        class="upload-btn @if (isset($skripsiMhs)) @if ($skripsiMhs->tgl_ujian_proposal) bg-info @else bg-secondary @endif @endif"
                                                        id="btnUjianProposal">
                                                        TANGGAL UJIAN
                                                    </button>
                                                    <input type="datetime-local" class="d-none form-control w-25 mx-auto"
                                                        name="tgl_ujian_proposal" id="formUjianProposal"
                                                        value="{{ isset($skripsiMhs) ? $skripsiMhs->tgl_ujian_proposal : '' }}">
                                                </h2>

                                                <div>
                                                    <button
                                                        class="upload-btn @if (isset($skripsiMhs)) @if ($skripsiMhs->file_proposal) success @endif @endif">SIMPAN</button>
                                                </div>
                                            </form>
                                            {{-- end form upload proposal --}}
                                        </div>

                                        <div class="section-content creative">
                                            {{-- form upload hasil --}}
                                            <form action="{{ url('upload-file-hasil') }}" method="post"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="mb-4">
                                                    <h6>Judul Tugas Akhir</h6>
                                                    @if (isset($skripsiMhs))
                                                        <div class="mt-3 pt-3 pb-2 w-75 mx-auto"
                                                            style="background: #eaeaea; border: 2px solid rgb(211, 211, 211)">
                                                            <h6 class="font-weight-bold">{{ $skripsiMhs->judul }}</h6>
                                                        </div>
                                                    @else
                                                        <div class="mt-3 pt-3 pb-2"
                                                            style="background: #eaeaea; border: 2px solid rgb(211, 211, 211)">
                                                            <h5>Belum ada judul.</h5>
                                                        </div>
                                                    @endif
                                                </div>
                                                <h2>
                                                    <label for="file_hasil"
                                                        class="upload-btn @if (isset($skripsiMhs)) @if ($skripsiMhs->file_hasil) success @endif @endif">Upload
                                                        File
                                                        HASIL</label>
                                                    <input type="file" id="file_hasil" class="upload-input"
                                                        name="file_hasil"
                                                        @if (isset($skripsiMhs)) @required(!$skripsiMhs->file_hasil) @endif />

                                                    {{-- Tanggal Ujian --}}
                                                    <button type="button"
                                                        class="upload-btn @if (isset($skripsiMhs)) @if ($skripsiMhs->tgl_ujian_hasil) bg-info @else bg-secondary @endif @endif"
                                                        id="btnUjianHasil">
                                                        TANGGAL UJIAN
                                                    </button>
                                                    <input type="datetime-local" class="d-none form-control w-25 mx-auto"
                                                        name="tgl_ujian_hasil" id="formUjianHasil"
                                                        value="{{ isset($skripsiMhs) ? $skripsiMhs->tgl_ujian_hasil : '' }}">
                                                </h2>
                                                <div>
                                                    <button
                                                        class="upload-btn @if (isset($skripsiMhs)) @if ($skripsiMhs->file_hasil) success @endif @endif">SIMPAN</button>
                                                </div>
                                            </form>
                                            {{-- end form upload haisl --}}
                                        </div>

                                        <div class="section-content production">
                                            {{-- form upload skripsi --}}
                                            <form action="{{ url('upload-file-skripsi') }}" method="post"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="mb-4">
                                                    <h6>Judul Tugas Akhir</h6>
                                                    @if (isset($skripsiMhs))
                                                        <div class="mt-3 pt-3 pb-2 w-75 mx-auto"
                                                            style="background: #eaeaea; border: 2px solid rgb(211, 211, 211)">
                                                            <h6 class="font-weight-bold">{{ $skripsiMhs->judul }}</h6>
                                                        </div>
                                                    @else
                                                        <div class="mt-3 pt-3 pb-2"
                                                            style="background: #eaeaea; border: 2px solid rgb(211, 211, 211)">
                                                            <h5>Belum ada judul.</h5>
                                                        </div>
                                                    @endif
                                                </div>
                                                <h2>
                                                    <label for="file_skripsi"
                                                        class="upload-btn @if (isset($skripsiMhs)) @if ($skripsiMhs->file_skripsi) success @endif @endif">Upload
                                                        File
                                                        SKRIPSI</label>
                                                    <input type="file" id="file_skripsi" class="upload-input"
                                                        name="file_skripsi"
                                                        @if (isset($skripsiMhs)) @required(!$skripsiMhs->file_skripsi) @endif />

                                                    {{-- Tanggal Ujian --}}
                                                    <button type="button"
                                                        class="upload-btn @if (isset($skripsiMhs)) @if ($skripsiMhs->tgl_ujian_skripsi) bg-info @else bg-secondary @endif @endif"
                                                        id="btnUjianSkripsi">
                                                        TANGGAL UJIAN
                                                    </button>
                                                    <input type="datetime-local" class="d-none form-control w-25 mx-auto"
                                                        name="tgl_ujian_skripsi" id="formUjianSkripsi"
                                                        value="{{ isset($skripsiMhs) ? $skripsiMhs->tgl_ujian_skripsi : '' }}">
                                                </h2>
                                                <div>
                                                    <button
                                                        class="upload-btn @if (isset($skripsiMhs)) @if ($skripsiMhs->file_skripsi) success @endif @endif">SIMPAN</button>
                                                </div>
                                            </form>
                                            {{-- end form upload skripsi --}}
                                        </div>

                                    </div>
                                </div>
                                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                                <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

                                {{-- SCRIPT TANGGAL UJIAN --}}
                                <script>
                                    // window.onload = function() {
                                    $("#btnUjianProposal").click(function() {
                                        if ($("#formUjianProposal").hasClass("d-none")) {
                                            $("#formUjianProposal").removeClass("d-none");
                                            $("#formUjianProposal").slideDown("slow");
                                        } else {
                                            $("#formUjianProposal").slideUp("slow", function() {
                                                $("#formUjianProposal").addClass("d-none");
                                            });
                                        }
                                    });

                                    $("#btnUjianHasil").click(function() {
                                        if ($("#formUjianHasil").hasClass("d-none")) {
                                            $("#formUjianHasil").removeClass("d-none");
                                            $("#formUjianHasil").slideDown("slow");
                                        } else {
                                            $("#formUjianHasil").slideUp("slow", function() {
                                                $("#formUjianHasil").addClass("d-none");
                                            });
                                        }
                                    });

                                    $("#btnUjianSkripsi").click(function() {
                                        if ($("#formUjianSkripsi").hasClass("d-none")) {
                                            $("#formUjianSkripsi").removeClass("d-none");
                                            $("#formUjianSkripsi").slideDown("slow");
                                        } else {
                                            $("#formUjianSkripsi").slideUp("slow", function() {
                                                $("#formUjianSkripsi").addClass("d-none");
                                            });
                                        }
                                    });
                                    // };
                                </script>

                                <script>
                                    jQuery(function() {
                                        jQuery('.step02').click();
                                    })
                                </script>
                                <script>
                                    jQuery(function() {
                                        jQuery('.step03').click();
                                    })
                                </script>
                                <script>
                                    jQuery(function() {
                                        jQuery('.step04').click();
                                    })
                                </script>


                                <script>
                                    $(".step").click(function() {
                                        $(this).addClass("active").prevAll().addClass("active");
                                        $(this).nextAll().removeClass("active");
                                    });

                                    $(".step01").click(function() {
                                        $("#line-progress").css("width", "0%");
                                        $(".discovery").addClass("active").siblings().removeClass("active");
                                    });
                                </script>

                                @if ($activeProposal)
                                    <script>
                                        $(".step02").click(function() {
                                            $("#line-progress").css("width", "33%");
                                            $(".strategy").addClass("active").siblings().removeClass("active");
                                        });
                                    </script>
                                @endif
                                @if ($activeProposal && $activeHasil)
                                    <script>
                                        $(".step03").click(function() {
                                            $("#line-progress").css("width", "66%");
                                            $(".creative").addClass("active").siblings().removeClass("active");
                                        });
                                    </script>
                                @endif
                                @if ($activeProposal && $activeHasil && $activeSkripsi)
                                    <script>
                                        $(".step04").click(function() {
                                            $("#line-progress").css("width", "100%");
                                            $(".production").addClass("active").siblings().removeClass("active");
                                        });
                                    </script>
                                @endif
                                {{-- @if (isset($skripsiMhs))
                                    @if (!is_null($skripsiMhs->tgl_ujian))
                                        <script>
                                            $(".step02").click(function() {
                                                $("#line-progress").css("width", "33%");
                                                $(".strategy").addClass("active").siblings().removeClass("active");
                                            });
                                        </script>
                                    @elseif (!is_null($skripsiMhs->tgl_ujian) && !is_null($skripsiMhs->file_proposal))
                                        <script>
                                            $(".step03").click(function() {
                                                $("#line-progress").css("width", "66%");
                                                $(".creative").addClass("active").siblings().removeClass("active");
                                            });
                                        </script>
                                    @elseif (!is_null($skripsiMhs->tgl_ujian) && !is_null($skripsiMhs->file_proposal && !is_null($skripsiMhs->file_hasil)))
                                        <script>
                                            $(".step04").click(function() {
                                                $("#line-progress").css("width", "100%");
                                                $(".production").addClass("active").siblings().removeClass("active");
                                            });
                                        </script>
                                    @endif
                                @endif --}}

                                {{-- @if ($skripsiMhs->file_hasil != null) --}}
                                {{-- <script>
                                    $(".step03").click(function() {
                                        $("#line-progress").css("width", "66%");
                                        $(".creative").addClass("active").siblings().removeClass("active");
                                    });
                                </script> --}}
                                {{-- @endif --}}

                                {{-- @if ($skripsiMhs->file_skripsi != null) --}}
                                {{-- <script>
                                    $(".step04").click(function() {
                                        $("#line-progress").css("width", "100%");
                                        $(".production").addClass("active").siblings().removeClass("active");
                                    });
                                </script> --}}
                                {{-- @endif
                                @endif --}}

                            </div>
                        </div>
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
