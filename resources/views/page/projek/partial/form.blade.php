@csrf
<div class="col-md-6">
    <div class="mb-3">
        <label for="nama_projek" class="form-label">Nama Projek</label>
        <input type="text" class="form-control px-2 bg-white" id="nama_projek" name="nama_projek" value="{{ $projek->nama_projek ?? old('nama_projek') }}" {{ Request::routeIs('projek.show') ? 'readonly' : ''}}>
        @error('nama_projek')
            <div class="text-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control px-2 bg-white" id="email" name="email" value="{{ $projek->email ?? old('email') }}" {{ Request::routeIs('projek.show') ? 'readonly' : ''}}>
        @error('email')
            <div class="text-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
    @if (!Request::routeIs('projek.show'))
        <div class="text-end">
            <button type="submit" class="btn btn-success">Simpan</button>
        </div>
    @endif
</div>
