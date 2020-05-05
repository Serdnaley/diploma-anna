@extends('layouts.base')

@section('nav')

    <div class="container layout-header">

        <div class="layout-header__logo">
            @include('components.logo-cat')
            @include('components.logo-text')
        </div>

        <ul class="layout-header__nav">
            <li class="layout-header__nav-item {{ \Route::currentRouteName() === 'topic.index' ? 'active' : '' }}">
                <a href="{{ route('topic.index') }}" class="nav-link">Topics</a>
            </li>
            <li class="layout-header__nav-item {{ \Route::currentRouteName() === 'category.index' ? 'active' : '' }}">
                <a href="{{ route('category.index') }}" class="nav-link">Categories</a>
            </li>
            <li class="layout-header__nav-item {{ \Route::currentRouteName() === 'user.index' ? 'active' : '' }}">
                <a href="{{ route('user.index') }}" class="nav-link">Users</a>
            </li>
            <li class="layout-header__nav-item {{ \Route::currentRouteName() === 'category.index' ? 'active' : '' }}">
                <a href="{{ route('chat.index') }}" class="nav-link">Chats</a>
            </li>
        </ul>

        <div class="layout-header__profile">

            @auth

                <div class="user-avatar__name">
                    <div class="color-{{ \Auth::user()->color }}">
                        {{ \Auth::user()->name }}
                    </div>
                    <confirm-action
                        @confirm="$refs['form-logout'].submit()"
                        title="Are you sure want to logout?"
                    >
                        <div class="btn-link">
                            Logout
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
