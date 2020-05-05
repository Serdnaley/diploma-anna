@extends('layouts.base')

@section('nav')

    <div class="container layout-header">

        <div class="layout-header__logo">
            @include('components.logo-cat')
            @include('components.logo-text')
        </div>

        <ul class="layout-header__nav">
            <li class="layout-header__nav-item {{ \Route::currentRouteName() === 'topic.index' ? 'active' : '' }}">
                <a href="{{ route('topic.index') }}" class="nav-link">Теми</a>
            </li>
            <li class="layout-header__nav-item {{ \Route::currentRouteName() === 'category.index' ? 'active' : '' }}">
                <a href="{{ route('category.index') }}" class="nav-link">Категорії</a>
            </li>
            <li class="layout-header__nav-item {{ \Route::currentRouteName() === 'user.index' ? 'active' : '' }}">
                <a href="{{ route('user.index') }}" class="nav-link">Користувачі</a>
            </li>
            <li class="layout-header__nav-item {{ \Route::currentRouteName() === 'chat.index' ? 'active' : '' }}">
                <a href="{{ route('chat.index') }}" class="nav-link">Діалоги</a>
            </li>
        </ul>

        <div class="layout-header__profile">

            @auth

                <div class="user-avatar__name">
                    <h2 class="color-{{ \Auth::user()->color }} mb-1">
                        {{ \Auth::user()->name }}
                    </h2>
                    <confirm-action
                        @confirm="$refs['form-logout'].submit()"
                        title="Ви дійсно хочете вийти з системи?"
                    >
                        <div class="btn-link">
                            Вийти з акаунту
                        </div>
                    </confirm-action>
                </div>

                <div class="user-avatar user-avatar--{{ \Auth::user()->color }}">
                    <div class="user-avatar__initials">
                        {{ \Auth::user()->initials }}
                    </div>
                </div>
            @endauth

        </div>

    </div>

@endsection

@section('main')

    <main>
        @yield('content')
    </main>

    <form
        action="{{ route('logout') }}"
        method="POST"
        class="d-none"
        ref="form-logout"
    >
        @csrf
        @method('POST')
    </form>

@endsection
