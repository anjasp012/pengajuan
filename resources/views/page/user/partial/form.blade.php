@csrf
<div class="col-md-6">
    <div class="mb-3">
        <label for="user_name" class="form-label">Nama</label>
        <input type="text" class="form-control px-2 bg-white" id="user_name" name="user_name" value="{{ $user->user_name ?? old('user_name') }}" {{ Request::routeIs('user.show') ? 'readonly' : ''}}>
        @error('user_name')
            <div class="text-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="id_jabatan" class="form-label">Jabatan</label>
        @if (Request::routeIs('user.create') || Request::routeIs('user.edit'))
            <select name="id_jabatan" id="id_jabatan" class="form-select bg-white px-2">
                <option value=""></option>
                @foreach ($jabatan as $item)
                    <option {{ old('id_jabatan', $user->id_jabatan ?? '') == $item->id_jabatan ? 'selected' : '' }} value="{{ $item->id_jabatan }}">{{ $item->nama_jabatan }}</option>
                @endforeach
            </select>
            @error('id_jabatan')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        @else
            <input type="text" class="form-control px-2 bg-white" id="user_name" name="user_name" value="{{ $user->user_name }}" readonly>
        @endif
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control px-2 bg-white" id="email" name="email" value="{{ $user->email ?? old('email') }}" {{ Request::routeIs('user.show') ? 'readonly' : ''}}>
        @error('email')
            <div class="text-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
    @if (Request::routeIs('user.create'))
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control px-2 bg-white" id="password" name="password" value="{{ $user->password ?? old('password') }}" {{ Request::routeIs('user.show') ? 'readonly' : ''}}>
            @error('password')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
    @endif
    @if (!Request::routeIs('user.show'))
        <div class="text-end">
            <button type="submit" class="btn btn-success">Simpan</button>
        </div>
    @endif
</div>
