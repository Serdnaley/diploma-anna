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
            <a class="d-flex mb-3" href="{{ route('user.show', ['user' => $user]) }}">
                <div class="user-avatar user-avatar--{{ $user->color }}">
                    <div class="user-avatar__initials">
                        {{ $user->initials }}
                    </div>
                </div>
                <div class="user-avatar__name">
                    <div class="color-{{ $user->color }}">
                        {{ $user->name }}
                    </div>
                    <small class="mt-1">at {{ $user->created_at->format('j F, Y') }}</small>
                </div>
            </a>
        @endforeach

        <hr>

        {{ $users->links() }}

    </div>

@endsection
