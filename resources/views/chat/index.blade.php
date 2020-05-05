@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="layout-title">

            <h1>
                {{ $current_chat->title ?? 'All chats' }}
            </h1>

            <div class="layout-title__actions">
                <a href="{{ route('chat.create') }}" class="btn btn-link">
                    Create chat
                </a>
                @if(isset($current_chat))
                    @can('delete', $current_chat)
                        <confirm-action
                            @confirm="$refs['form-chat-delete'].submit()"
                            title="Are you sure want to delete '{{ $current_chat->title }}'?"
                        >
                            <div class="btn btn-link text-danger" slot="reference">
                                Delete chat
                            </div>
                        </confirm-action>
                    @endcan
                    @can('update', $current_chat)
                        <a href="{{ route('chat.edit', ['chat' => $current_chat]) }}" class="btn btn-primary">
                            Edit chat
                        </a>
                    @endcan
                @endif
            </div>
        </div>

        <hr>

        <div class="d-flex">
            <div class="layout-sidebar ml-0 mr-3">

                @foreach($chats as $chat)
                    @include('chat.list-item', ['chat' => $chat])
                @endforeach

            </div>

            <div class="w-100 ml-3">
                @if(isset($current_chat))
                    @yield('chat')
                @else
                    <div class="message-list d-flex justify-content-center align-items-center">
                        <p class="color-secondary">
                            Choice an chat.
                        </p>
                    </div>
                @endif
            </div>
        </div>

        <hr>

    </div>

@endsection
