@extends('layouts.app')

@section('content')
    <h3 class="fw-bold">{{ $actived }}</h3>

    <div class="py-4">
        <form action="{{ route('projek.update', $projek->id_projek) }}" class="row" method="POST">
            @method('PATCH')
            @include('page.projek.partial.form')
        </form>
    </div>
@endsection
