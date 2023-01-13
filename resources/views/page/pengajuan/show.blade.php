@extends('layouts.app')

@section('content')
    <h3 class="fw-bold">Lihat {{ $actived }}</h3>

    <div class="py-4">
        <form action="{{ route('pengajuan.store') }}" class="row g-3" method="POST">
            @include('page.pengajuan.partial.form')
        </form>
    </div>
@endsection
