@extends('layouts.app')

@section('content')
    <h3 class="fw-bold">{{ $actived }}</h3>

    <div class="py-4">
        <form action="{{ route('tipe.update', $tipe->id_tipe) }}" class="row" method="POST">
            @method('PATCH')
            @include('page.tipe.partial.form')
        </form>
    </div>
@endsection
