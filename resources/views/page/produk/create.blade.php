@extends('layouts.app')

@section('content')
    <h3 class="fw-bold">Tambah {{ $actived }}</h3>

    <div class="py-4">
        <form action="{{ route('produk.store') }}" class="row g-3" method="POST">
            @include('page.produk.partial.form')
        </form>
    </div>
@endsection

@section('script')
    <script>
        $projek = $('#id_projek');
        $id_projek = `{{ old('id_projek') }}`;
        $tipe = $('#id_tipe');
        $id_tipe = `{{ old('id_tipe') }}`;


        $(function() {
            if ($projek.val() != 'Pilih...') {
                opsiMultipleTipe(`{{ url('api/list-tipe') }}/${$projek.val()}`, $tipe, $id_tipe);
            }
            $projek.on('change', function() {
                opsiMultipleTipe(`{{ url('api/list-tipe') }}/${$projek.val()}`, $tipe, $id_tipe);
            });
        });
        var tanpa_rupiah = document.getElementById('harga');
            tanpa_rupiah.addEventListener('keyup', function(e){
                tanpa_rupiah.value = formatRupiah(this.value, 'Rp. ');
            });

            function formatRupiah(angka, prefix){
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split    = number_string.split(','),
                sisa     = split[0].length % 3,
                rupiah     = split[0].substr(0, sisa),
                ribuan     = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
            }
    </script>
@endsection
