<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard " target="_blank">
        <img src="{{ asset('img/logo-ct.png') }}" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold text-white">Material Dashboard 2</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white{{Request::routeIs('dashboard') ? ' active bg-gradient-primary' : ''}}" href="{{ route('dashboard') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        @if (auth()->user()->id_jabatan == '1')
            <li class="nav-item">
            <a class="nav-link text-white{{Request::routeIs('jabatan.*') ? ' active bg-gradient-primary' : ''}}" href="{{ route('jabatan.index') }}">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">person</i>
                </div>
                <span class="nav-link-text ms-1">Jabatan</span>
            </a>
            </li>
            <li class="nav-item">
            <a class="nav-link text-white{{Request::routeIs('user.*') ? ' active bg-gradient-primary' : ''}}" href="{{ route('user.index') }}">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">person</i>
                </div>
                <span class="nav-link-text ms-1">User</span>
            </a>
            </li>
            <li class="nav-item">
            <a class="nav-link text-white{{Request::routeIs('projek.*') ? ' active bg-gradient-primary' : ''}}" href="{{ route('projek.index') }}">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">table_view</i>
                </div>
                <span class="nav-link-text ms-1">Projek</span>
            </a>
            </li>
            <li class="nav-item">
            <a class="nav-link text-white{{Request::routeIs('tipe.*') ? ' active bg-gradient-primary' : ''}}" href="{{ route('tipe.index') }}">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">table_view</i>
                </div>
                <span class="nav-link-text ms-1">Tipe</span>
            </a>
            </li>
            <li class="nav-item">
            <a class="nav-link text-white{{Request::routeIs('produk.*') ? ' active bg-gradient-primary' : ''}}" href="{{ route('produk.index') }}">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">table_view</i>
                </div>
                <span class="nav-link-text ms-1">Produk</span>
            </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white{{Request::routeIs('pengajuan.*') ? ' active bg-gradient-primary' : ''}}" href="{{ route('pengajuan.index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons opacity-10">table_view</i>
                    </div>
                    <span class="nav-link-text ms-1">Pengajuan</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white{{Request::routeIs('disetujui.*') ? ' active bg-gradient-primary' : ''}}" href="{{ route('disetujui.index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons opacity-10">table_view</i>
                    </div>
                    <span class="nav-link-text ms-1">Disetujui</span>
                </a>
            </li>
        @elseif (auth()->user()->id_jabatan == '4')
            <li class="nav-item">
            <a class="nav-link text-white{{Request::routeIs('pengajuan.*') ? ' active bg-gradient-primary' : ''}}" href="{{ route('pengajuan.index') }}">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">table_view</i>
                </div>
                <span class="nav-link-text ms-1">Pengajuan</span>
            </a>
            </li>
            <li class="nav-item">
            <a class="nav-link text-white{{Request::routeIs('revisi.*') ? ' active bg-gradient-primary' : ''}}" href="{{ route('revisi.index') }}">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">table_view</i>
                </div>
                <span class="nav-link-text ms-1">Revisi</span>
            </a>
            </li>
            <li class="nav-item">
            <a class="nav-link text-white{{Request::routeIs('disetujui.*') ? ' active bg-gradient-primary' : ''}}" href="{{ route('disetujui.index') }}">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">table_view</i>
                </div>
                <span class="nav-link-text ms-1">Disetujui</span>
            </a>
            </li>
        @elseif (auth()->user()->id_jabatan == '3')
            <li class="nav-item">
                <a class="nav-link text-white{{Request::routeIs('datapengajuandiskon.*') ? ' active bg-gradient-primary' : ''}}" href="{{ route('datapengajuandiskon.index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons opacity-10">table_view</i>
                    </div>
                    <span class="nav-link-text ms-1">Data Pengajuan Diskon</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white{{Request::routeIs('datarevisi.*') ? ' active bg-gradient-primary' : ''}}" href="{{ route('datarevisi.index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons opacity-10">table_view</i>
                    </div>
                    <span class="nav-link-text ms-1">Data Pengajuan Revisi</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white{{Request::routeIs('datapersetujuansales.*') ? ' active bg-gradient-primary' : ''}}" href="{{ route('datapersetujuansales.index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons opacity-10">table_view</i>
                    </div>
                    <span class="nav-link-text ms-1">Data Persetujuan Sales</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white{{Request::routeIs('pengajuandiskonkegm.*') ? ' active bg-gradient-primary' : ''}}" href="{{ route('pengajuandiskonkegm.index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons opacity-10">table_view</i>
                    </div>
                    <span class="nav-link-text ms-1">Pengajuan Diskon Ke Gm</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white{{Request::routeIs('disetujuigm.*') ? ' active bg-gradient-primary' : ''}}" href="{{ route('disetujuigm.index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons opacity-10">table_view</i>
                    </div>
                    <span class="nav-link-text ms-1">Disetujui Gm</span>
                </a>
            </li>
        @elseif (auth()->user()->id_jabatan == '2')
            <li class="nav-item">
                <a class="nav-link text-white{{Request::routeIs('pengajuandarimanager.*') ? ' active bg-gradient-primary' : ''}}" href="{{ route('pengajuandarimanager.index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons opacity-10">table_view</i>
                    </div>
                    <span class="nav-link-text ms-1">Pengajuan Dari Manager</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white{{Request::routeIs('setuju.*') ? ' active bg-gradient-primary' : ''}}" href="{{ route('setuju.index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons opacity-10">table_view</i>
                    </div>
                    <span class="nav-link-text ms-1">Disetujui</span>
                </a>
            </li>
        @endif
        {{-- <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Account pages</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="../pages/profile.html">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">person</i>
            </div>
            <span class="nav-link-text ms-1">Profile</span>
          </a>
        </li> --}}
      </ul>
    </div>
  </aside>
