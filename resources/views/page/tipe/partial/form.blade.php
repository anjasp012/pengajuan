@csrf
<div class="col-md-6">
    <div class="mb-3">
        <label for="nama_tipe" class="form-label">Nama Tipe</label>
        <input type="text" class="form-control px-2 bg-white" id="nama_tipe" name="nama_tipe" value="{{ $tipe->nama_tipe ?? old('nama_tipe') }}" {{ Request::routeIs('tipe.show') ? 'readonly' : '' }}>
        @error('nama_tipe')
            <div class="text-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="projek" class="form-label">Projek</label>
        @if (Request::routeIs('tipe.create'))
            <select name="id_projek" id="id_projek" class="form-select px-2 bg-white">
                <option value="">Pilih</option>
                @foreach ($projek as $item)
                    <option {{ $item->id_projek == $tipe->id_projek ? 'selected' : '' }} {{ old('id_projek') == $item->id_projek ? 'selected' : '' }} value="{{ $item->id_projek }}">{{ $item->nama_projek }}</option>
                @endforeach
            </select>
            @error('id_projek')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        @else
            <input type="text" class="form-control px-2 bg-white" id="text" name="text" value="{{ $tipe->projek->nama_projek }}" readonly>
        @endif
    </div>
    @if (!Request::routeIs('tipe.show'))
        <div class="text-end">
            <button type="submit" class="btn btn-success">Simpan</button>
        </div>
    @endif
</div>
