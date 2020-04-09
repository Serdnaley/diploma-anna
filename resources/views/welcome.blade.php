@extends('layouts.app')

@section('nav')
    <!-- navigation hidden -->
@endsection

@section('content')

    <div class="welcome-screen">
        <div class="flex-center position-ref full-height">

            <div class="content">
                <div class="title main-logo m-b-md">
                    <span>C</span>
                    <span>a</span>
                    <span>t</span>
                    <span>o</span>
                    <span>b</span>
                    <span>o</span>
                    <span>o</span>
                    <span>k</span>
                </div>

                <div class="links">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ route('topic.index') }}">News</a>
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
        <p class="text-center">
            Created by <a href="https://www.instagram.com/littlewarmtalks/" target="_blank">Anormous Human</a>
        </p>
    </div>

@endsection
