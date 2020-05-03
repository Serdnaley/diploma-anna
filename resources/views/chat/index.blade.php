@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row align-items-center mt-5">
            <div class="col">
                <h1>All chats</h1>
            </div>
            <div class="col-auto">
                <a href="{{ route('chat.create') }}" class="btn btn-link">
                    Create chat
                </a>
            </div>
        </div>

        <hr>

        @foreach($chats as $chat)
            @include('chat.list-item', ['chat' => $chat])
        @endforeach

        <hr>

        {{ $chats->links() }}

    </div>

@endsection
