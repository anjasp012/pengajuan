@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6 class="text-white text-capitalize ps-3">Tabel {{ $actived }}</h6>
                        <a href="{{ route('tipe.create') }}" class="btn bg-gradient-success me-3 my-0">Tambah</a>
                    </div>
                </div>
                </div>
                <div class="card-body px-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Tipe</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Projek</th>
                            <th class="text-secondary opacity-7">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tipe as $item => $data)
                            <tr>
                                <td class="align-middle">
                                    <h6 class="mb-0 px-3">{{ $item+1 }}</h6>
                                </td>
                                <td class="align-middle">
                                    <h6 class="mb-0 px-3">{{ $data->nama_tipe }}</h6>
                                </td>
                                <td class="align-middle">
                                    <h6 class="mb-0 px-3">{{ $data->projek->nama_projek }}</h6>
                                </td>
                                <td class="align-middle">
                                    <button class="btn btn-link text-secondary mb-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-ellipsis-v text-xs"></i>
                                    </button>
                                    <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n5 shadow-lg border" style="z-index: 1;">
                                        <li><a class="dropdown-item" href="{{ route('tipe.show', $data->id_tipe) }}">Detail</a></li>
                                        <li><a class="dropdown-item" href="{{ route('tipe.edit', $data->id_tipe) }}">Edit</a></li>
                                        <li>
                                            <form action="{{ route('tipe.destroy', $data->id_tipe) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="dropdown-item">Hapus</button>
                                            </form>
                                        </li>
                                    </ul>
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
@endsection
