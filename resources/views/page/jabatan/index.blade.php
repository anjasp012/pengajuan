@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6 class="text-white text-capitalize ps-3">Tabel {{ $actived }}</h6>
                        <a href="" class="btn bg-gradient-success me-3 my-0">Tambah</a>
                    </div>
                </div>
                </div>
                <div class="card-body px-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Jabatan</th>
                            <th class="text-secondary opacity-7">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jabatan as $item => $data)
                            <tr>
                                <td class="align-middle">
                                    <h6 class="mb-0 px-3">{{ $item+1 }}</h6>
                                </td>
                                <td class="align-middle">
                                    <h6 class="mb-0 px-3">{{ $data->nama_jabatan }}</h6>
                                </td>
                                <td class="align-middle">
                                    <button class="btn btn-link text-secondary mb-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-ellipsis-v text-xs"></i>
                                    </button>
                                    <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n5 shadow-lg border" style="z-index: 1;">
                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                        <li><a class="dropdown-item" href="#">Another action</a></li>
                                        <li><a class="dropdown-item" href="#">Something else here</a></li>
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
                    <a href="" class="btn btn-primary btn-small">Tambah</a>
                </div>

                <div class="py-4">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Jabatan</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jabatan as $data)
                                <tr>
                                    <th scope="row">1</th>
                                    <td>{{ $data->nama_jabatan }}</td>
                                    <td>
                                        <a href="" class="btn btn-info btn-small fw-bold">Lihat</a>
                                        <a href="" class="btn btn-warning btn-small fw-bold">Edit</a>
                                        <a href="" class="btn btn-danger btn-small fw-bold">Hapus</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div> --}}
@endsection
