@extends('layouts.app')

@section('content')

    <div class="container layout-sidebar">

        <div class="layout-title">
            <h1>All users</h1>
        </div>

        <hr>

        @foreach($users as $user)
            @include('user.list-item', ['user' => $user])
        @endforeach

        <hr>

        {{ $users->links() }}

    </div>

@endsection
