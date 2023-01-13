<div class="col-md-3">
    <div class="p-3 bg-white border rounded shadow-sm h-100">
        <ul class="nav nav-pills flex-column">
            <li>
                <a href="{{ route('dashboard') }}" class="nav-link{{ $actived == 'Dashboard' ? ' active' : ' text-dark' }}">
                    Dashboard
                </a>
            </li>
            @if (auth()->user()->id_jabatan == '1')
                <li>
                    <a href="{{ route('jabatan.index') }}" class="nav-link{{ $actived == 'Jabatan' ? ' active' : ' text-dark' }}">
                        Jabatan
                    </a>
                </li>
                <li>
                    <a href="{{ route('user.index') }}" class="nav-link{{ $actived == 'User' ? ' active' : ' text-dark' }}">
                        Users
                    </a>
                </li>
                <li>
                    <a href="{{ route('projek.index') }}" class="nav-link{{ $actived == 'Projek' ? ' active' : ' text-dark' }}">
                        Projek
                    </a>
                </li>
                <li>
                    <a href="{{ route('tipe.index') }}" class="nav-link{{ $actived == 'Tipe' ? ' active' : ' text-dark' }}">
                        Tipe
                    </a>
                </li>
                <li>
                    <a href="{{ route('produk.index') }}" class="nav-link{{ $actived == 'Produk' ? ' active' : ' text-dark' }}">
                        Produk
                    </a>
                </li>
            @elseif (auth()->user()->id_jabatan == '4')
                <li>
                    <a href="{{ route('pengajuan.index') }}" class="nav-link{{ $actived == 'Pengajuan' ? ' active' : ' text-dark' }}">
                    Pengajuan
                    </a>
                </li>
                <li>
                    <a href="{{ route('revisi.index') }}" class="nav-link{{ $actived == 'Revisi' ? ' active' : ' text-dark' }}">
                    Revisi
                    </a>
                </li>
                <li>
                    <a href="{{ route('disetujui.index') }}" class="nav-link{{ $actived == 'Disetujui' ? ' active' : ' text-dark' }}">
                    Disetujui
                    </a>
                </li>
            @elseif (auth()->user()->id_jabatan == '3')
                <li>
                    <a href="{{ route('datapengajuandiskon.index') }}" class="nav-link{{ $actived == 'Data Pengajuan Diskon' ? ' active' : ' text-dark' }}">
                        Data Pengajuan Diskon
                    </a>
                </li>
                <li>
                    <a href="{{ route('datapersetujuansales.index') }}" class="nav-link{{ $actived == 'Data Persetujuan Sales' ? ' active' : ' text-dark' }}">
                        Data Persetujuan Sales
                    </a>
                </li>
                <li>
                    <a href="{{ route('pengajuandiskonkegm.index') }}" class="nav-link{{ $actived == 'Pengajuan Diskon Ke General Manager' ? ' active' : ' text-dark' }}">
                        Pengajuan Diskon Ke Gm
                    </a>
                </li>
                <li>
                    <a href="{{ route('disetujuigm.index') }}" class="nav-link{{ $actived == 'Disetujui Gm' ? ' active' : ' text-dark' }}">
                        Disetujui Gm
                    </a>
                </li>
            @elseif (auth()->user()->id_jabatan == '2')
            <li>
                <a href="{{ route('pengajuandarimanager.index') }}" class="nav-link{{ $actived == 'Pengajuan Dari Manager' ? ' active' : ' text-dark' }}">
                    Pengajuan Dari Manager
                </a>
            </li>
            <li>
                <a href="{{ route('setuju.index') }}" class="nav-link{{ $actived == 'Setujui' ? ' active' : ' text-dark' }}">
                    Disetujui
                </a>
            </li>
            @endif
        </ul>
    </div>
</div>
