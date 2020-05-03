@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row align-items-center mt-5">
            <div class="col">
                <h1>All users</h1>
            </div>
            <div class="col-auto">
                <a href="{{ route('user.create') }}" class="btn btn-link">
                    Create user
                </a>
            </div>
        </div>

        <hr>

        @foreach($users as $user)
            @include('user.list-item', ['user' => $user])
        @endforeach

        <hr>

        {{ $users->links() }}

    </div>

@endsection
