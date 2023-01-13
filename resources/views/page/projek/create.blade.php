@extends('layouts.app')

@section('content')
    <h3 class="fw-bold">Tambah {{ $actived }}</h3>

    <div class="py-4">
        <form action="{{ route('projek.store') }}" class="row g-3" method="POST">
            @include('page.projek.partial.form')
        </form>
    </div>
@endsection
