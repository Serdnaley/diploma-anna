@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="my-4">
            <a href="{{ route('user.index') }}" class="btn-link">
                <i class="fas fa-arrow-left"></i>
                Повернутися до списку
            </a>
        </div>

        <div class="layout-title">

            <div class="d-flex">
                <div
                    class="user-avatar user-avatar--{{ $user->color }}"
                    style="font-size: 32px;"
                >
                    <div class="user-avatar__initials">
                        {{ $user->initials }}
                    </div>
                </div>
                <div class="user-avatar__name">
                    <h1 class="color-{{ $user->color }}">
                        {{ $user->name }}
                    </h1>
                </div>
            </div>

            <div class="">
                @can('delete', $user)
                    <confirm-action
                        @confirm="$refs['form-user-delete'].submit()"
                        title="Ви дійсно хочете видалити '{{ $user->name }}'?"
                    >
                        <div class="btn btn-link text-danger" slot="reference">
                            Видалити користувача
                        </div>
                    </confirm-action>
                @endcan
                @can('update', $user)
                    <a href="{{ route('user.edit', ['user' => $user]) }}" class="btn btn-primary">
                        Редагувати користувача
                    </a>
                @endcan
            </div>
        </div>

        <hr>

        <div class="list">
            @if ($topics->isEmpty())
                <p>
                    @if($user->id === \Auth::user()->id)
                        У вас немає жодного обговорення :(
                    @else
                        У цього користувача немає жодного обговорення :(
                    @endif
                </p>
            @endif

            @foreach($topics as $topic)
                @include('topic.list-item', ['topic' => $topic])
            @endforeach
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
