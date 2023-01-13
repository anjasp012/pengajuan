@extends('layouts.app')

@section('content')
    <h3 class="fw-bold">Tambah {{ $actived }}</h3>

    <div class="py-4">
        <form action="{{ route('user.store') }}" class="row g-3" method="POST">
            @include('page.user.partial.form')
        </form>
    </div>
@endsection
