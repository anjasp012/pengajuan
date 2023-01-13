@csrf
<div class="col-md-6">
    <div class="mb-3">
        <label for="projek" class="form-label">Projek</label>
        @if (Request::routeIs('produk.create'))
            <select name="id_projek" id="id_projek" class="form-select px-2 bg-white">
                <option value="">Pilih</option>
                @foreach ($projek as $item)
                    <option {{ old('id_projek', $produk->id_projek ?? '') == $item->id_projek ? 'selected' : '' }} value="{{ $item->id_projek }}">{{ $item->nama_projek }}</option>
                @endforeach
            </select>
            @error('id_projek')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        @else
            <input type="text" class="form-control px-2 bg-white" id="text" name="text" value="{{ $produk->projek->nama_projek }}" readonly>
        @endif
    </div>
    <div class="mb-3">
        <label for="id_tipe" class="form-label">Tipe</label>
        @if (Request::routeIs('produk.create'))
            <select id="id_tipe" class="form-select px-2" name="id_tipe" disabled>
                <option>Pilih Projek Dulu ..</option>
            </select>
            @error('id_tipe')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        @else
            <input type="text" class="form-control px-2 bg-white" id="text" name="text" value="{{ $produk->tipe->nama_tipe }}" readonly>
        @endif
    </div>
    <div class="mb-3">
        <label for="nama_produk" class="form-label">Nama Produk</label>
        <input type="text" class="form-control px-2 bg-white" id="nama_produk" name="nama_produk" value="{{ $produk->nama_produk ?? old('nama_produk') }}" {{ Request::routeIs('produk.show') ? 'readonly' : ''}}>
        @error('nama_produk')
            <div class="text-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="harga" class="form-label">Harga</label>
        <input type="text" class="form-control px-2 bg-white" id="harga" name="harga"
            value="{{ $produk->harga ?? old('harga') }}" {{ Request::routeIs('produk.show') ? 'readonly' : ''}}>
        @error('harga')
            <div class="text-danger">
                {{ $message }}
            </div>
        @enderror
    </div>

    @if (!Request::routeIs('produk.show'))
        <div class="text-end">
            <button type="submit" class="btn btn-success">Simpan</button>
        </div>
    @endif
</div>
