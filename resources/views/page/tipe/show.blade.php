@extends('layouts.app')

@section('content')
    <h3 class="fw-bold">{{ $actived }}</h3>

    <div class="py-4">
        <div class="row">
            @include('page.tipe.partial.form')
        </div>
    </div>
@endsection
