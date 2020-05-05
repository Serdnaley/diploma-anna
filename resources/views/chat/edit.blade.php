@extends('layouts.form')

@section('content')

    <div class="container layout-sidebar">

        <div class="my-4">
            <a href="{{ route('chat.index') }}" class="btn-link">
                <i class="fas fa-arrow-left"></i>
                Повернутися до списку
            </a>
        </div>


        <div class="layout-title">

            <h1>Редагувати</h1>

            <div class="layout-title__actions">
                @can('delete', $chat)
                    <confirm-action
                        @confirm="$refs['form-chat-delete'].submit()"
                        title="Ви дійсно хочете видалити '{{ $chat->title }}'?"
                    >
                        <div class="btn btn-link text-danger" slot="reference">
                            Видалити
                        </div>
                    </confirm-action>
                @endcan
                <a href="{{ route('chat.show', ['chat' => $chat]) }}" class="btn btn-primary">
                    Перейти до діалогу
                </a>
            </div>
        </div>

        <hr>

        <form action="{{ route('chat.update', ['chat' => $chat]) }}" method="post">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="chat-create-title">Заголовок</label>
                <input
                    type="text"
                    class="form-control"
                    id="chat-create-title"
                    name="title"
                    value="{{ $chat->title }}"
                    required
                >
            </div>

            <div class="form-group">
                <label>Користувачі</label>
                <div class="select-users-list">
                    <div class="wrapper">
                        @foreach($users as $user)
                            <label class="d-flex align-items-center mb-3">
                                <input
                                    type="checkbox"
                                    name="user_ids[]"
                                    value="{{ $user->id }}"
                                    {{ array_search($user->id, $chat->user_ids) ? 'checked' : '' }}
                                >
                                <div class="d-flex ml-2">
                                    <div class="user-avatar user-avatar--{{ $user->color }}">
                                        <div class="user-avatar__initials">
                                            {{ $user->initials }}
                                        </div>
                                    </div>
                                    <div class="user-avatar__name">
                                        <div class="color-{{ $user->color }}">
                                            {{ $user->name }}
                                        </div>
                                    </div>
                                </div>
                            </label>
                        @endforeach
                    </div>
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

            <button type="submit" class="btn btn-primary">
                Зберегти
            </button>
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
