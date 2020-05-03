@extends('layouts.app')

@section('nav')
    <!-- navigation hidden -->
@endsection

@section('content')

    <div class="welcome-screen" tabindex="-1">
        <div class="position-ref full-height">

            <div class="content">

                <div class="logo">
                    @include('components.logo-cat')
                </div>

                <div class="divider"></div>

                <div class="right">

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="title"
                        viewBox="0 0 500 128"
                    >
                        <text y="64">Welcome,</text>
                        @auth
                            <text y="128">{{ \Auth::user()->name }}</text>
                        @else
                            <text y="128">Dear Reader</text>
                        @endauth
                    </svg>

                    <div class="links">
                        @if (Route::has('login'))
                            @auth
                                <a href="{{ route('topic.index') }}">Let's communicate</a>
                            @else
                                <a href="{{ route('login') }}">Login</a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}">Register</a>
                                @endif
                            @endauth
                        @endif
                    </div>
                </div>
            </div>

        </div>
        <p class="footer-text">
            Created with LOVE by <a href="https://www.instagram.com/littlewarmtalks/" target="_blank">Anormous Human</a>
        </p>
    </div>

@endsection
