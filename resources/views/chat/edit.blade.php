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
                <h1>Edit chat</h1>
            </div>
            <div class="col-auto">
                @can('delete', $chat)
                    <confirm-action
                        @confirm="$refs['form-chat-delete'].submit()"
                        confirm-button-text="Delete"
                        confirm-button-class="btn btn-danger"
                    >
                        <div class="btn btn-link text-danger" slot="reference">
                            Delete chat
                        </div>
                        Are you sure want to delete "{{ $chat->title }}"?
                    </confirm-action>
                @endcan
                <a href="{{ route('chat.show', ['chat' => $chat]) }}" class="btn btn-primary">
                    View chat
                </a>
            </div>
        </div>

        <hr>

        <div class="card mb-3">
            <div class="card-body">
                <form action="{{ route('chat.update', ['chat' => $chat]) }}" method="post">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col">

                            <div class="form-group">
                                <label for="chat-create-title">Title</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="chat-create-title"
                                    name="title"
                                    value="{{ $chat->title }}"
                                    required
                                >
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

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>User</label>
                                <div class="select-users-list">
                                    @foreach($users as $user)
                                        <label class="d-flex">
                                            <input
                                                type="checkbox"
                                                name="user_ids[]"
                                                value="{{ $user->id }}"
                                                {{ array_search($user->id, $chat->user_ids) ? 'checked' : '' }}
                                            >
                                            @include('user.list-item', ['user' => $user, 'disable_link' => true])
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <form
            action="{{ route('chat.destroy', ['chat' => $chat]) }}"
            method="POST"
            class="d-none"
            ref="form-chat-delete"
        >
            @csrf
            @method('DELETE')
        </form>

    </div>

@endsection
