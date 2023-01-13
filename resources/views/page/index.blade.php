@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-xl-6 col-sm-6 mb-xl-4 mb-4">
            @if (auth()->user()->id_jabatan == '4' || auth()->user()->id_jabatan == '1')
                <a href="{{ route('pengajuan.index') }}">
            @elseif (auth()->user()->id_jabatan == '3')
                <a href="{{ route('datapengajuandiskon.index') }}">
            @elseif (auth()->user()->id_jabatan == '2')
                <a href="{{ route('pengajuandarimanager.index') }}">
            @endif
                    <div class="card">
                        <div class="card-header p-3 pt-2">
                            <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                            <i class="material-icons opacity-10">weekend</i>
                            </div>
                            <div class="text-end pt-1">
                            @if (auth()->user()->id_jabatan == '2')
                                <p class="text-sm mb-0 text-capitalize">Pengajuan Dari Manager</p>
                                <h2 class="mb-0">{{ $pengajuanDariManager }}</h2>
                            @else
                                <p class="text-sm mb-0 text-capitalize">Perlu Persetujuan</p>
                                <h2 class="mb-0">{{ $proses }}</h2>
                            @endif
                            </div>
                        </div>
                        <div class="card-footer p-3">
                        </div>
                    </div>
                </a>
        </div>
        @if (!auth()->user()->id_jabatan == '2')
            <div class="col-xl-6 col-sm-6">
                @if (auth()->user()->id_jabatan == '4')
                    <a href="{{ route('revisi.index') }}">
                @elseif (auth()->user()->id_jabatan == '3')
                    <a href="{{ route('datarevisi.index') }}">
                @endif
                        <div class="card">
                            <div class="card-header p-3 pt-2">
                                <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                                <i class="material-icons opacity-10">flip</i>
                                </div>
                                <div class="text-end pt-1">
                                <p class="text-sm mb-0 text-capitalize">Perlu Revisi</p>
                                <h2 class="mb-0">{{ $revisi }}</h2>
                                </div>
                            </div>
                            <div class="card-footer p-3">
                            </div>
                        </div>
                    </a>
            </div>
        @endif
        <div class="col-xl-6 col-sm-6 mb-4">
            @if (auth()->user()->id_jabatan == '4' || auth()->user()->id_jabatan == '1')
                <a href="{{ route('disetujui.index') }}">
            @elseif (auth()->user()->id_jabatan == '3')
                <a href="{{ route('datapersetujuansales.index') }}">
            @elseif (auth()->user()->id_jabatan == '2')
                <a href="{{ route('setuju.index') }}">
            @endif
                    <div class="card">
                        <div class="card-header p-3 pt-2">
                            <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                            <i class="material-icons opacity-10">check</i>
                            </div>
                            <div class="text-end pt-1">
                            @if (auth()->user()->id_jabatan == '2')
                                <p class="text-sm mb-0 text-capitalize">Disetujui</p>
                                <h2 class="mb-0">{{ $setujuiDariManager }}</h2>
                            @else
                                <p class="text-sm mb-0 text-capitalize">Pengajuan Disetujui</p>
                                <h2 class="mb-0">{{ $disetujui }}</h2>
                            @endif
                            </div>
                        </div>
                        <div class="card-footer p-3">
                        </div>
                    </div>
                </a>
        </div>
        @if (auth()->user()->id_jabatan == '3')
            <div class="col-xl-6 col-sm-6 mb-4">
                <a href="{{ route('pengajuandiskonkegm.index') }}">
                    <div class="card">
                        <div class="card-header p-3 pt-2">
                            <div class="icon icon-lg icon-shape bg-gradient-dark shadow-info text-center border-radius-xl mt-n4 position-absolute">
                            <i class="material-icons opacity-10">weekend</i>
                            </div>
                            <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">Pengajuan Diskon Ke Gm</p>
                            <h2 class="mb-0">{{ $keGm }}</h2>
                            </div>
                        </div>
                        <div class="card-footer p-3">
                        </div>
                    </div>
                </a>
            </div>
        @endif
        @if (auth()->user()->id_jabatan == '3')
            <div class="col-xl-6 col-sm-6">
                <a href="{{ route('disetujuigm.index') }}">
                    <div class="card">
                        <div class="card-header p-3 pt-2">
                            <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                            <i class="material-icons opacity-10">check</i>
                            </div>
                            <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">Pengajuan Disetujui Gm</p>
                            <h2 class="mb-0">{{ $disetujuiGm }}</h2>
                            </div>
                        </div>
                        <div class="card-footer p-3">
                        </div>
                    </div>
                </a>
            </div>
        @endif
    </div>
    {{-- <h3 class="fw-bold">{{ $actived }}</h3>
    Anda Login Sebagai {{ auth()->user()->jabatan->nama_jabatan }}

    <div class="py-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center">Pengajuan</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card text-center">
                                    <div class="card-body">{{ $proses }}</div>
                                    <div class="card-footer">Perlu Persetujuan</div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card text-center">
                                    <div class="card-body">{{ $revisi }}</div>
                                    <div class="card-footer">Revisi</div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card text-center">
                                    <div class="card-body">{{ $disetujui }}</div>
                                    <div class="card-footer">Disetujui</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
