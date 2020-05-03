@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="my-4">
            <a href="{{ route('chat.index') }}" class="btn-link">
                <i class="fas fa-arrow-left"></i>
                Back to list
            </a>
        </div>

        <div class="row align-items-center">
            <div class="col">
                <h1>{{ $chat->title }}</h1>
            </div>
            <div class="col-auto">
                @can('delete', $chat)
                    <confirm-action
                        @confirm="$refs['form-chat-delete'].submit()"
                        title="Are you sure want to delete '{{ $chat->title }}'?"
                    >
                        <div class="btn btn-link text-danger" slot="reference">
                            Delete chat
                        </div>
                    </confirm-action>
                @endcan
                @can('update', $chat)
                    <a href="{{ route('chat.edit', ['chat' => $chat]) }}" class="btn btn-primary">
                        Edit chat
                    </a>
                @endcan
            </div>
        </div>

        <hr>

        <div class="card-text d-flex align-items-center">
            <div class="d-flex">
                <div class="user-avatar user-avatar--{{ $chat->author->color }}">
                    <div class="user-avatar__initials">
                        {{ $chat->author->initials }}
                    </div>
                </div>
                <div class="user-avatar__name">
                    <div class="color-{{ $chat->author->color }}">
                        {{ $chat->author->name }}
                    </div>
                    <small class="mt-1">at {{ $chat->created_at->format('j F, Y') }}</small>
                </div>
            </div>
        </div>

        <hr>

        @if($messages->isEmpty())
            <p class="text-muted">Your message will be first :)</p>
        @endif

        @foreach($messages as $message)
            @include('message.list-item', ['message' => $message])
        @endforeach

        <hr>

        <div class="d-flex align-items-center justify-content-between">
            <div>
                <h5 class="card-title">Message chat</h5>
            </div>
        </div>

        <form action="{{ route('message.store') }}" method="POST">
            @csrf
            @method('POST')

            <input type="hidden" name="chat_id" value="{{ $chat->id }}">

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <textarea
                            name="text"
                            class="form-control"
                            placeholder="Write your message here..."
                            cols="10"
                            rows="5"
                            required
                        ></textarea>
                    </div>
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary">
                        Submit
                        <i class="fas fa-arrow-up"></i>
                    </button>
                </div>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0 pl-3">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

        </form>

        <form
            method="POST"
            style="display:none"
            ref="form-message-delete"
        >
            @csrf
            @method('DELETE')
        </form>

        <form
            action="{{ route('chat.destroy', ['chat' => $chat]) }}"
            method="POST"
            style="display:none"
            ref="form-chat-delete"
        >
            @csrf
            @method('DELETE')
        </form>

    </div>

@endsection
