@extends('layouts.base')

@section('app-class', '')

@section('main')

    <div class="welcome-screen">
        <div class="position-ref full-height">

            <div class="content">

                <div class="logo">
                    @include('components.logo-cat')
                    @include('components.logo-text')
                </div>

                <div class="divider"></div>

                <div class="right">

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="title"
                        viewBox="0 0 500 150"
                    >
                        <text y="64">Привіт,</text>
                        <text y="128">{{ \Auth::user()->name }}</text>
                    </svg>

                    <div class="links">
                        <p>
                            В нашого кота є 2 справи: прочитати книжку та поспілкуватись із вами. <br>
                            Книжку він вже прочитав, тож…
                        </p>
                        <a href="{{ route('topic.index') }}">
                            Перейти до форуму
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>

        </div>
        <p class="footer-text">
            Курсовий проект <br>
            Студентки 315 групи <br>
            Саржан Ганни
        </p>
    </div>

@endsection
