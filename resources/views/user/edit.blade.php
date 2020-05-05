@extends('layouts.form')

@section('content')

    <div class="container">

        <div class="my-4">
            <a href="{{ route('user.index') }}" class="btn-link">
                <i class="fas fa-arrow-left"></i>
                Повернутися до списку
            </a>
        </div>

        <div class="layout-title">

            <h1>Редагувати</h1>

            <div class="">
                @can('delete', $user)
                    <confirm-action
                        @confirm="$refs['form-user-delete'].submit()"
                        title="Ви дійсно хочете видалити '{{ $user->name }}'?"
                    >
                        <div class="btn btn-link text-danger" slot="reference">
                            Видалити
                        </div>
                    </confirm-action>
                @endcan
                <a href="{{ route('user.show', ['user' => $user]) }}" class="btn btn-primary">
                    Перейти до профілю
                </a>
            </div>
        </div>

        <hr>

        <div class="card mb-3">
            <div class="card-body">
                <form action="{{ route('user.update', ['user' => $user]) }}" method="post">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="user-create-name">Ім'я</label>
                        <input
                            type="text"
                            class="form-control"
                            id="user-create-name"
                            name="name"
                            value="{{ $user->name }}"
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

                    <button type="submit" class="btn btn-primary">
                        Зберегти
                    </button>
                </form>
            </div>
        </div>

        <form
            action="{{ route('user.destroy', ['user' => $user]) }}"
            method="POST"
            class="d-none"
            ref="form-user-delete"
        >
            @csrf
            @method('DELETE')
        </form>

    </div>

@endsection
