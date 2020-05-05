@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="layout-title">
            <h1>Усі користувачі</h1>
        </div>

        <hr>

        <div class="list mt-4 mb-1">
            @foreach($users as $user)
                @include('user.list-item', ['user' => $user])
            @endforeach
        </div>

        <hr>

        {{ $users->links() }}

    </div>

@endsection
