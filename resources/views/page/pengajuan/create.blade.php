@extends('layouts.app')

@section('content')
    <h3 class="fw-bold">Tambah {{ $actived }}</h3>

    <div class="py-4">
        <form action="{{ route('pengajuan.store') }}" class="row g-3" method="POST">
            @include('page.pengajuan.partial.form')
        </form>
    </div>
@endsection
@section('script')
    <script>
        $projek = $('#id_projek');
        $produk = $('#id_produk');
        $id_projek = `{{ old('id_projek') }}`;
        $id_produk = `{{ old('id_produk') }}`;
        $harga = $('#harga_produk');
        $old_harga = `{{ old('harga_produk') }}`;
        $manager = $('#id_manager');
        $id_manager = `{{ old('id_manager') }}`;

        $harga.val('')

        $(function() {
            if ($projek.val() != 'Pilih...') {
                opsiMultiple(`{{ url('api/list-produk') }}/${$projek.val()}`, $produk, $id_produk);
            }
            if ($id_produk) {
                tampilManager(`{{ url('api/manager-produk') }}/${$id_produk}`, $manager, $id_manager);
                tampilHarga(`{{ url('api/harga-produk') }}/${$id_produk}`, $harga);
            }
            $projek.on('change', function() {
                opsiMultiple(`{{ url('api/list-produk') }}/${$projek.val()}`, $produk, $id_produk);
                tampilManager(`{{ url('api/manager-projek') }}/${$projek.val()}`, $manager, $id_manager);
            });
            // $produk.on('change', function() {
            // });
            $produk.on('change', function() {
                tampilHarga(`{{ url('api/harga-produk') }}/${$produk.val()}`, $harga);
            });
        });
        var tanpa_rupiah = document.getElementById('nilai_disc_pengajuan');
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
