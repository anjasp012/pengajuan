@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <div class="d-flex justify-content-between align-items-baseline">
                            <h6 class="text-white text-capitalize ps-3">Tabel {{ $actived }}</h6>
                            @if ($actived == 'Pengajuan')
                                @if (auth()->user()->id_jabatan != 1)
                                    <a href="{{ route('pengajuan.create') }}" class="btn bg-gradient-success me-3 my-0">Tambah</a>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Sales</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Projek</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Produk</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Harga</th>
                                    @if (Request::routeIs('disetujui.index') || Request::routeIs('datapersetujuansales.index'))
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nilai Disetujui</th>
                                    @else
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nilai</th>
                                    @endif
                                    <th class="text-secondary opacity-7">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pengajuan as $item => $data)
                                    <tr>
                                        <td class="align-middle">
                                            <h6 class="mb-0 px-3">{{ $item+1 }}</h6>
                                        </td>
                                        <td class="align-middle">
                                            <h6 class="mb-0 px-3">{{ $data->user->user_name }}</h6>
                                        </td>
                                        <td class="align-middle">
                                            <h6 class="mb-0 px-3">{{ $data->projek->nama_projek }}</h6>
                                        </td>
                                        <td class="align-middle">
                                            <h6 class="mb-0 px-3">{{ $data->produk->nama_produk }}</h6>
                                        </td>
                                        <td class="align-middle">
                                            <h6 class="mb-0 px-3">{{ $data->harga_produk }}</h6>
                                        </td>
                                        <td class="align-middle">
                                            @if (Request::routeIs('disetujui.index') || Request::routeIs('datapersetujuansales.index'))
                                                <h6 class="mb-0 px-3 ">{{ $data->nilai_disc_disetujui }}</h6>
                                            @else
                                                @if ($data->nilai_setuju_2)
                                                    <h6 class="mb-0 px-3 ">{{ $data->nilai_setuju_2 }}</h6>
                                                @else
                                                    <h6 class="mb-0 px-3 ">{{ $data->nilai_disc_pengajuan }}</h6>
                                                @endif
                                            @endif
                                        </td>
                                        <td class="align-middle">
                                            <button class="btn btn-link text-secondary mb-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fa fa-ellipsis-v text-xs"></i>
                                            </button>
                                            <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n5 shadow-lg border" style="z-index: 1;">
                                                @if ($actived == 'Pengajuan')
                                                        <li><a href="" class="dropdown-item">Lihat</a></li>
                                                        <li><a href="" class="dropdown-item">Edit</a></li>
                                                        <li><a href="" class="dropdown-item">Hapus</a></li>
                                                @elseif ($actived == 'Revisi')
                                                        <li><a href="{{ route('revisi.edit', $data->id_pengajuan) }}" class="dropdown-item">Edit</a></li>
                                                        <li><form action="{{ route('revisi.destroy', $data->id_pengajuan) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="dropdown-item">Hapus</button>
                                                        </form></li>
                                                @elseif ($actived == 'Disetujui')
                                                        <li><a href="" class="dropdown-item">Lihat</a></li>
                                                @elseif ($actived == 'Data Pengajuan Diskon'||$actived == 'Disetujui Gm')
                                                        <li><a href="{{ route('datapengajuandiskon.show', $data->id_pengajuan) }}" class="dropdown-item">Lihat</a></li>
                                                @elseif ($actived == 'Data Persetujuan Sales')
                                                        <li><a href="" class="dropdown-item">Lihat</a></li>
                                                @elseif ($actived == 'Pengajuan Dari Manager')
                                                        <li><a href="{{ route('pengajuandarimanager.show', $data->id_pengajuan) }}" class="dropdown-item">Lihat</a></li>
                                                @endif
                                            </ul>
                                                {{-- <ul class="dropdown-menu dropdown-menu-end px-2 py-3 me-sm-n5 bg-body shadow-lg">
                                                </ul> --}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
                {{-- <div class="d-flex justify-content-between align-item-center">
                    <h3 class="fw-bold">Tabel {{ $actived }}</h3>
                    @if ($actived == 'Pengajuan')
                        <a href="{{ route('pengajuan.create') }}" class="btn btn-primary btn-small">Tambah</a>
                    @endif
                </div>

                <div class="py-4">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Projek</th>
                                <th scope="col">Produk</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Nilai Disc Pengajuan</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pengajuan as $data)
                                <tr>
                                    <th scope="row">1</th>
                                    <td>{{ $data->projek->nama_projek }}</td>
                                    <td>{{ $data->produk->nama_produk }}</td>
                                    <td>{{ $data->harga_produk }}</td>
                                    <td>{{ $data->nilai_disc_pengajuan }}</td>
                                    @if ($actived == 'Pengajuan')
                                        <td>
                                            <a href="" class="btn btn-info btn-small fw-bold">Lihat</a>
                                            <a href="" class="btn btn-warning btn-small fw-bold">Edit</a>
                                            <a href="" class="btn btn-danger btn-small fw-bold">Hapus</a>
                                        </td>
                                    @elseif ($actived == 'Revisi')
                                        <td>
                                            <a href="" class="btn btn-warning btn-small fw-bold">Edit</a>
                                            <form class="d-inline" action="{{ route('revisi.destroy', $data->id_pengajuan) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-small fw-bold">Hapus</button>
                                            </form>
                                        </td>
                                    @elseif ($actived == 'Disetujui')
                                        <td>
                                            <a href="" class="btn btn-info btn-small fw-bold">Lihat</a>
                                        </td>
                                    @elseif ($actived == 'Data Pengajuan Diskon')
                                        <td>
                                            <a href="{{ route('datapengajuandiskon.show', $data->id_pengajuan) }}" class="btn btn-info btn-small fw-bold">Lihat</a>
                                        </td>
                                    @elseif ($actived == 'Data Persetujuan Sales')
                                        <td>
                                            <a href="" class="btn btn-info btn-small fw-bold">Lihat</a>
                                        </td>
                                    @elseif ($actived == 'Pengajuan Dari Manager')
                                        <td>
                                            <a href="{{ route('pengajuandarimanager.show', $data->id_pengajuan) }}" class="btn btn-info btn-small fw-bold">Lihat</a>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div> --}}
@endsection
