@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6 class="text-white text-capitalize ps-3">Tabel {{ $actived }}</h6>
                        <a href="{{ route('projek.create') }}" class="btn bg-gradient-success me-3 my-0">Tambah</a>
                    </div>
                </div>
                </div>
                <div class="card-body px-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0" id="table">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">General Manager</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jumlah Manager</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Projek</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                            <th class="text-uppercase opacity-7">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projek as $item => $data)
                            <tr>
                                <td class="align-middle">
                                    <h6 class="mb-0 px-3">{{ $item+1 }}</h6>
                                </td>
                                <td class="align-middle">
                                    <h6 class="mb-0 px-3">{{ $data->generalManager->user_name ?? '' }}</h6>
                                </td>
                                <td class="align-middle">
                                    <h6 class="mb-0 px-3">{{ $data->manager->count() ?? '' }}  <a data-bs-toggle="modal" href="#exampleModalToggle{{ $data->id_projek }}" role="button" id="modal" class="btn btn-warning btn-sm mb-0"">Cek</a></h6>
                                </td>
                                <td class="align-middle">
                                    <h6 class="mb-0 px-3">{{ $data->nama_projek }}</h6>
                                </td>
                                <td class="align-middle">
                                    <h6 class="mb-0 px-3">{{ $data->email }}</h6>
                                </td>
                                <td class="align-middle">
                                    <button class="btn btn-link text-secondary mb-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-ellipsis-v text-xs"></i>
                                    </button>
                                    <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n5 shadow-lg border" style="z-index: 1;">
                                        <li><a class="dropdown-item" href="{{ route('projek.show', $data->id_projek) }}">Detail</a></li>
                                        <li><a class="dropdown-item" href="{{ route('projek.edit', $data->id_projek) }}">Edit</a></li>
                                        <li>
                                            <form action="{{ route('projek.destroy', $data->id_projek) }}" method="POST">
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
                            <div class="modal fade" id="exampleModalToggle{{ $data->id_projek }}" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h1 class="modal-title fs-5" id="exampleModalToggleLabel">{{ $data->nama_projek }}</h1>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            @foreach ($data->manager as $item)
                                                <div class="col-md-4 mb-2"><div class="card rounded-1 text-center"><h5>{{ $item->user_name }}</h5></div></div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                        @endforeach
                    </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection
{{-- @section('script')
<script type='text/javascript'>
    $(document).ready(function(){

        $(document).on("click", "#modal", function () {
            console.log($(this).attr('data-id'));
           var empid = $(this).attr('data-id');

           if(empid > 0){

              // AJAX request
              var url = `{{ url('api/manager-produk') }}/${empid}`;
              url = url.replace(':empid',empid);

              // Empty modal data
              $('#tblempinfo tbody').empty();

              $.ajax({
                  url: url,
                  dataType: 'json',
                  success: function(response){

                      // Add employee details
                      $('#tblempinfo tbody').html(response.html);

                      // Display Modal
                      $('#empModal').modal('show');
                  }
              });
           }
       });

    });
    </script>
@endsection --}}
