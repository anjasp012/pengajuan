@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="dropdown ms-3">
                            <button class="btn btn-info dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ $dropdown }}
                            </button>
                            <ul class="dropdown-menu dropdown-menu-dark bg-gradient-dark">
                                @if (!Request::routeIs('user.generalManager'))
                                    <li><a class="dropdown-item" href="{{ route('user.generalManager') }}">General Manager</a></li>
                                @endif
                                @if (!Request::routeIs('user.manager'))
                                    <li><a class="dropdown-item" href="{{ route('user.manager') }}">Manager</a></li>
                                @endif
                                @if (!Request::routeIs('user.sales'))
                                    <li><a class="dropdown-item" href="{{ route('user.sales') }}">Sales</a></li>
                                @endif
                                @if (!Request::routeIs('user.index'))
                                    <li><a class="dropdown-item" href="{{ route('user.index') }}">Semua User</a></li>
                                @endif
                            </ul>
                        </div>
                        <a href="{{ route('user.create') }}" class="btn bg-gradient-success me-3">Tambah</a>
                        {{-- <h6 class="text-white text-capitalize ps-3">Tabel {{ $actived }}</h6> --}}
                    </div>
                </div>
                </div>
                <div class="card-body px-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Username</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jabatan</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Projek</th>
                            <th class="text-secondary opacity-7">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $item => $data)
                            <tr>
                                <td class="align-middle">
                                    <h6 class="mb-0 px-3">{{ $item+1 }}</h6>
                                </td>
                                <td class="align-middle">
                                    <h6 class="mb-0 px-3">{{ $data->user_name }}</h6>
                                </td>
                                <td class="align-middle">
                                    <h6 class="mb-0 px-3">{{ $data->jabatan->nama_jabatan }}</h6>
                                </td>
                                <td class="align-middle">
                                    <div id="inputReadonly{{ $data->id_user }}" class="d-flex gap-1 align-items-center">
                                        <input readonly type="text" style="color: #344767;font-size: 1rem;line-height: 1.625" class="form-control border px-3 w-50 fw-bold" value="{{ $data->projek->nama_projek ?? '' }}">
                                        <button class="btn btn-warning btn-sm mb-0" onclick="ubahProjek({{ $data->id_user }})">Ubah</button>
                                    </div>
                                    <form id="formProjek{{ $data->id_user }}" action="{{ route('user.updateUserProjek', $data->id_user) }}" method="POST" class="d-none">
                                        @csrf
                                        @method('PATCH')
                                        <div class="d-flex gap-1 align-items-center">
                                            <select name="id_projek" id="id_projek" style="color: #344767;font-size: 1rem;line-height: 1.625" class="form-select px-3 w-50 fw-bold bg-white">
                                                <option value=null></option>
                                                @foreach ($projek as $item)
                                                    <option {{ ( $item->id_projek == $data->id_projek) ? 'selected' : '' }} value="{{ $item->id_projek }}">{{ $item->nama_projek }}</option>
                                                @endforeach
                                            </select>
                                            <button type="button" class="btn btn-secondary btn-sm mb-0" onclick="batalubahProjek({{ $data->id_user }})">Batal</button>
                                            <button type="submit" class="btn btn-success btn-sm mb-0">Simpan</button>
                                        </div>
                                    </form>
                                </td>
                                <td class="align-middle">
                                    <button class="btn btn-link text-secondary mb-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-ellipsis-v text-xs"></i>
                                    </button>
                                    <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n5 shadow-lg border" style="z-index: 1;">
                                        <li><a class="dropdown-item" href="{{ route('user.show', $data->id_user) }}">Detail</a></li>
                                        <li><a class="dropdown-item" href="{{ route('user.edit', $data->id_user) }}">Edit</a></li>
                                        <li><a class="dropdown-item" href="{{ route('user.editPassword', $data->id_user) }}">Ubah Password</a></li>
                                        <li>
                                            <form action="{{ route('user.destroy', $data->id_user) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="dropdown-item">Hapus</button>
                                            </form>
                                        </li>
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
@endsection

@section('script')
    <script>
        function ubahProjek(params) {
            console.log('formProjek' +params);
            var form = document.getElementById('formProjek' +params);
            var inputReadonly = document.getElementById('inputReadonly' +params);
            form.classList.remove("d-none");
            inputReadonly.classList.add("d-none");
        }
        function batalubahProjek(params) {
            var form = document.getElementById('formProjek' +params);
            var inputReadonly = document.getElementById('inputReadonly' +params);
            form.classList.add("d-none");
            inputReadonly.classList.remove("d-none");
        }
    </script>
@endsection
