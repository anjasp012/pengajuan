<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- CSS Files -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .judul {
            text-align: center;
        }

        .halaman {
            width: auto;
            height: auto;
        }
    </style>
</head>
<body>
    <div class="row justify-content-center vh-100 align-items-center">
        <div class="col-md-6 p-5" style="padding: 100px 200px">
            <div class="halaman">
                <h3 class="judul">SURAT PERSETUJUAN PENGAJUAN</h3>
                <p>Kepada Yth<br/>
                Bpk {{ $data->user->user_name }}<br/>
                Ditempat</p>
                <div>Saya <b>Setujui</b> pengajuan diskon atas Produk :</div>
                <table style="margin-left: 0px">
                    <tr>
                        <td style="width:45%;">Nama Projek</td>
                        <td style="width:5%;">:</td>
                        <td style="width:100%;">{{ $data->produk->nama_produk }}</td>
                    </tr>
                    <tr>
                        <td style="width:45%;">Harga Produk</td>
                        <td style="width:5%;">:</td>
                        <td style="width:100%;">Rp {{ $data->harga_produk }}</td>
                    </tr>
                    <tr>
                        <td style="width:45%;">Diskon yang Disetujui</td>
                        <td style="width:5%;">:</td>
                        <td style="width:100%;">{{ $data->nilai_disc_disetujui }} %</td>
                    </tr>
                    <tr>
                        <td style="width:45%;">Keterangan Disetujui</td>
                        <td style="width:5%;">:</td>
                        <td style="width:100%;">{{ $data->keterangan_disetujui }}</td>
                    </tr>
                </table>
                <p>demikian persetujuan pengajuan saya lampirkan</p>
                <a style="padding: 10px 18px;background: black;color: white;border-radius: 5px;text-decoration: none;font-weight: 700" href="{{ route('datapengajuandiskon.show', $data->id_pengajuan) }}">Link Produk Disetujui</a>
                <div style="width:100%;text-align:right;float:right;">Terima Kasih</div><br>
                <div style="width:100%;text-align:right;float:right;">{{ $data->manager->user_name }}</div>
            </div>
        </div>
    </div>
</body>
</html>
