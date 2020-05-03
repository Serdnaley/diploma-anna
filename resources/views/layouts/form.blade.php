@extends('layouts.base')

@section('main')

    <main class="layout-form">

        @if (session()->has('success'))
            <div class="container">
                @if(is_array(session()->get('success')))
                    @foreach (session()->get('success') as $message)
                        <div class="alert alert-success">
                            {{ $message }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endforeach
                @else
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
            </div>
        @endif

        @yield('content')
    </main>

@endsection
