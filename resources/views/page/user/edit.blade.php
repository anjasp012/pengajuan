@extends('layouts.app')

@section('content')
    <h3 class="fw-bold">{{ $actived }}</h3>

    <div class="py-4">
        <form action="{{ route('user.update', $user->id_user) }}" class="row" method="POST">
            @method('PATCH')
            @include('page.user.partial.form')
        </form>
    </div>
@endsection
