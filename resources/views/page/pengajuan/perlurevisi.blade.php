@extends('layouts.app')

@section('content')
    <h3 class="fw-bold">{{ $actived }}</h3>

    <div class="py-4">
        <form action="{{ route('datarevisi.update', $pengajuan->id_pengajuan) }}" class="row g-3" method="POST">
            @method('PUT')
            @include('page.pengajuan.partial.form')
        </form>
    </div>
@endsection
