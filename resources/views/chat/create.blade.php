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
            <h1>Створити діалог</h1>
        </div>

        <hr>

        <form action="{{ route('chat.store') }}" method="post">
            @csrf
            @method('POST')

            <div class="mr-3">
                <div class="form-group">
                    <label for="chat-create-title">Заголовок</label>
                    <input
                        type="text"
                        class="form-control"
                        id="chat-create-title"
                        name="title"
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
                    Створити
                </button>

            </div>
        </form>

    </div>

@endsection
