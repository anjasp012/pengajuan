@csrf
@if (Request::routeIs('revisi.edit'))
    <div class="col-md-6">
        <label for="alasan_revisi" class="form-label text-danger fw-bold">Keterangan Alasan Revisi</label>
        <textarea name="alasan_revisi" class="form-control px-2 bg-white" @if (Request::routeIs('*.show')||Request::routeIs('datapersetujuansales.show')||Request::routeIs('pengajuandiskonkegm.show')||Request::routeIs('pengajuandarimanager.show')||Request::routeIs('datarevisi.show')||Request::routeIs('revisi.edit')) readonly
        @endif>{{ $pengajuan->alasan_revisi ?? old('alasan_revisi') }}</textarea>
        {{-- <input type="text" class="form-control px-2 bg-white" id="alasan_revisi" name="alasan_revisi" value="{{ $pengajuan->alasan_revisi ?? old('alasan_revisi') }}"> --}}
        @error('alasan_revisi')
            <div class="text-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
@endif
@if (!Request::routeIs('pengajuan.*'))
    <div class="col-md-6">
        <label for="id_user" class="form-label">Sales</label>
        <input readonly type="text" class="form-control px-2 bg-white" id="id_user" name="id_user" value="{{ $pengajuan->user->user_name ?? old('id_user') }}">
        @error('id_user')
            <div class="text-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
@endif
<div class="col-md-6">
    <label for="id_projek" class="form-label">Projek</label>
    @if (Request::routeIs('*.show')||Request::routeIs('datapersetujuansales.edit')||Request::routeIs('pengajuandiskonkegm.edit')||Request::routeIs('pengajuandarimanager.edit')||Request::routeIs('datarevisi.edit')||Request::routeIs('revisi.edit'))
        <input readonly type="text" class="form-control px-2 bg-white" id="id_projek" name="id_projek" value="{{ $pengajuan->projek->nama_projek ?? old('id_manager') }}">
    @else
        <select id="id_projek" class="form-select px-2 bg-white" name="id_projek">
            <option>Pilih...</option>
            @foreach ($projek as $item)
            <option {{ $item->id_projek == $pengajuan->id_projek ? 'selected' : '' }} {{ old('id_projek') == $item->id_projek ? 'selected' : '' }} value="{{ $item->id_projek }}">
                {{ $item->nama_projek }}</option>
            @endforeach
        </select>
    @endif
    @error('role')
        <div class="text-danger">
            {{ $message }}
        </div>
    @enderror
</div>
<div class="col-md-6">
    <label for="id_manager" class="form-label">Manager</label>
    @if (Request::routeIs('*.show')||Request::routeIs('datapersetujuansales.edit')||Request::routeIs('pengajuandiskonkegm.edit')||Request::routeIs('pengajuandarimanager.edit')||Request::routeIs('datarevisi.edit')||Request::routeIs('revisi.edit'))
        <input readonly type="text" class="form-control px-2 bg-white" id="id_manager" name="id_manager" value="{{ $pengajuan->manager->user_name ?? old('id_manager') }}">
    @endif
    @if (Request::routeIs('pengajuan.create'))
        <select id="id_manager" class="form-select px-2" name="id_manager" disabled>
            <option>Pilih Produks Dulu ..</option>
        </select>
    @endif
    @error('id_manager')
        <div class="text-danger">
            {{ $message }}
        </div>
    @enderror
</div>
<div class="col-md-6">
    <label for="id_produk" class="form-label">Produk</label>
    @if (Request::routeIs('*.show')||Request::routeIs('datapersetujuansales.edit')||Request::routeIs('pengajuandiskonkegm.edit')||Request::routeIs('pengajuandarimanager.edit')||Request::routeIs('datarevisi.edit')||Request::routeIs('revisi.edit'))
        <input readonly type="text" class="form-control px-2 bg-white" id="id_produk" name="id_produk" value="{{ $pengajuan->produk->nama_produk }}">
    @else
        <select id="id_produk" class="form-select px-2" name="id_produk" disabled>
            <option>Pilih Projek Dulu ..</option>
        </select>
    @endif
    @error('id_produk')
        <div class="text-danger">
            {{ $message }}
        </div>
    @enderror
</div>
<div class="col-md-6">
    <label for="harga_produk" class="form-label">Harga Produk</label>
    <input readonly type="text" class="form-control px-2 bg-white" id="harga_produk" name="harga_produk" value="{{ $pengajuan->harga_produk ?? '' }}">
    @error('harga_produk')
        <div class="text-danger">
            {{ $message }}
        </div>
    @enderror
</div>
@if (!Request::routeIs('pengajuandiskonkegm.edit'))
    <div class="col-md-6">
        <label for="nilai_disc_pengajuan" class="form-label">Nilai disc pengajuan</label>
        <input type="text" class="form-control px-2 bg-white" id="nilai_disc_pengajuan" name="nilai_disc_pengajuan"
            value="{{ $pengajuan->nilai_setuju_2 ?? $pengajuan->nilai_disc_pengajuan ?? old('nilai_disc_pengajuan') }}" @if (Request::routeIs('*.show')||Request::routeIs('datapersetujuansales.edit')||Request::routeIs('pengajuandiskonkegm.edit')||Request::routeIs('pengajuandarimanager.edit')||Request::routeIs('datarevisi.edit')) readonly
            @endif>
        @error('nilai_disc_pengajuan')
            <div class="text-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="col-md-6">
        <label for="keterangan_pengajuan" class="form-label">Keterangan pengajuan</label>
        <textarea name="keterangan_pengajuan" class="form-control px-2 bg-white" @if (Request::routeIs('*.show')||Request::routeIs('datapersetujuansales.edit')||Request::routeIs('pengajuandiskonkegm.edit')||Request::routeIs('pengajuandarimanager.edit')||Request::routeIs('datarevisi.edit')) readonly
        @endif>{{$pengajuan->keterangan_disetujui_2 ?? $pengajuan->keterangan_pengajuan ?? old('keterangan_pengajuan') }}</textarea>
        {{-- <input type="text" class="form-control px-2 bg-white" id="keterangan_pengajuan" name="keterangan_pengajuan" value="{{ $pengajuan->keterangan_pengajuan ?? old('keterangan_pengajuan') }}"> --}}
        @error('keterangan_pengajuan')
            <div class="text-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
@endif

@if (Request::routeIs('datarevisi.edit'))
    <div class="col-md-6">
        <label for="alasan_revisi" class="form-label">Keterangan Alasan Revisi</label>
        <textarea name="alasan_revisi" class="form-control px-2 bg-white" @if (Request::routeIs('*.show')||Request::routeIs('datapersetujuansales.show')||Request::routeIs('pengajuandiskonkegm.show')||Request::routeIs('pengajuandarimanager.show')||Request::routeIs('datarevisi.show')) readonly
        @endif>{{ $pengajuan->alasan_revisi ?? old('alasan_revisi') }}</textarea>
        {{-- <input type="text" class="form-control px-2 bg-white" id="alasan_revisi" name="alasan_revisi" value="{{ $pengajuan->alasan_revisi ?? old('alasan_revisi') }}"> --}}
        @error('alasan_revisi')
            <div class="text-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
@endif

@if (Request::routeIs('datapersetujuansales.edit'))
    <div class="col-md-6">
        <label for="nilai_disc_disetujui" class="form-label">Nilai disc Disetujui</label>
        <input type="text" class="form-control px-2 bg-white" id="nilai_disc_disetujui" name="nilai_disc_disetujui"
            value="{{ $pengajuan->nilai_disc_disetujui ?? old('nilai_disc_disetujui') }}" @if (Request::routeIs('*.show')) readonly
            @endif>
        @error('nilai_disc_disetujui')
            <div class="text-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="col-md-6">
        <label for="keterangan_disetujui" class="form-label">Keterangan Disetujui</label>
        <input type="text" class="form-control px-2 bg-white" id="keterangan_disetujui" name="keterangan_disetujui" value="{{ $pengajuan->keterangan_disetujui ?? old('keterangan_disetujui') }}" @if (Request::routeIs('*.show')) readonly
        @endif>
        @error('keterangan_disetujui')
            <div class="text-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
@endif
@if (Request::routeIs('pengajuandiskonkegm.edit')||(Request::routeIs('pengajuandarimanager.show')||Request::routeIs('pengajuandarimanager.edit')))
    <div class="col-md-6">
        <label for="id_general_manager" class="form-label">General Manager</label>
        @if (Request::routeIs('pengajuandarimanager.show')||Request::routeIs('pengajuandarimanager.edit'))
            <input readonly type="text" class="form-control px-2 bg-white" id="id_general_manager" name="id_general_manager" value="{{  $pengajuan->generalManager->user_name }}">
        @else
        <input readonly type="text" class="form-control px-2 bg-white" id="id_general_manager" name="id_general_manager" value="{{  $generalManager->user_name }}">
        @endif
        @error('id_general_manager')
            <div class="text-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="col-md-6">
        <label for="nilai_disc_pengajuan_2" class="form-label">Nilai disc pengajuan</label>
        <input type="text" class="form-control px-2 bg-white" id="nilai_disc_pengajuan_2" name="nilai_disc_pengajuan_2"
            value="{{ $pengajuan->nilai_disc_pengajuan_2 ?? old('nilai_disc_pengajuan_2') }}" @if (Request::routeIs('*.show')||Request::routeIs('pengajuandarimanager.edit')) readonly
            @endif>
        @error('nilai_disc_pengajuan_2')
            <div class="text-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="col-md-6">
        <label for="keterangan_pengajuan_2" class="form-label">Keterangan Pengajuan</label>
        <textarea name="keterangan_pengajuan_2" id="keterangan_pengajuan_2" class="form-control px-2 bg-white" @if (Request::routeIs('*.show')||Request::routeIs('pengajuandarimanager.edit')) readonly
        @endif>{{ $pengajuan->keterangan_pengajuan_2 ?? old('keterangan_pengajuan_2') }}</textarea>
        @error('keterangan_pengajuan_2')
            <div class="text-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
@endif
@if (Request::routeIs('pengajuandarimanager.edit'))
    <div class="col-md-6">
        <label for="nilai_setuju_2" class="form-label">Nilai Setujui</label>
        <input type="text" class="form-control px-2 bg-white" id="nilai_setuju_2" name="nilai_setuju_2"
            value="{{ $pengajuan->nilai_setuju_2 ?? old('nilai_setuju_2') }}" @if (Request::routeIs('*.show')) readonly
            @endif>
        @error('nilai_setuju_2')
            <div class="text-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="col-md-6">
        <label for="keterangan_disetujui_2" class="form-label">Keterangan Disetujui</label>
        <textarea name="keterangan_disetujui_2" id="keterangan_disetujui_2" class="form-control px-2 bg-white"  @if (Request::routeIs('*.show')) readonly
        @endif>{{ $pengajuan->keterangan_disetujui_2 ?? old('keterangan_disetujui_2') }}</textarea>
        {{-- <input type="text" class="form-control px-2 bg-white" id="keterangan_disetujui_2" name="keterangan_disetujui_2" value="{{ $pengajuan->keterangan_disetujui_2 ?? old('keterangan_disetujui_2') }}" @if (Request::routeIs('*.show')) readonly
        @endif> --}}
        @error('keterangan_disetujui_2')
            <div class="text-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
@endif
<div>
    @if (Request::routeIs('datapengajuandiskon.show'))
        <a href="{{ route('datapersetujuansales.edit', $pengajuan->id_pengajuan) }}" class="btn btn-success">Setujui</a>
        <a href="{{ route('datarevisi.edit', $pengajuan->id_pengajuan) }}" class="btn btn-warning">Revisi</a>
        @if (!$pengajuan->keterangan_disetujui_2)
            <a href="{{ route('pengajuandiskonkegm.edit', $pengajuan->id_pengajuan) }}" class="btn btn-dark">Ajukan ke GM</a>
        @endif
    @elseif (Request::routeIs('datapersetujuansales.edit'))
        <button type="submit" class="btn btn-primary">Submit</button>
    @elseif (Request::routeIs('pengajuandiskonkegm.edit'))
        <button type="submit" class="btn btn-primary">Submit</button>
    @elseif (Request::routeIs('datarevisi.edit'))
        <button type="submit" class="btn btn-primary">Submit</button>
    @elseif (Request::routeIs('pengajuandarimanager.show'))
        <a href="{{ route('pengajuandarimanager.edit', $pengajuan->id_pengajuan) }}" class="btn btn-success">Setujui</a>
    @else
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="reset" class="btn btn-secondary">Reset</button>
    @endif
</div>
