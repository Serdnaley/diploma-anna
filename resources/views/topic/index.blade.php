@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row align-items-center mt-5">
            <div class="col">
                <h1>All topics</h1>
            </div>
            <div class="col-auto">
                <a href="{{ route('topic.create') }}" class="btn btn-link">
                    Create topic
                </a>
            </div>
        </div>

        <hr>

        @foreach($topics as $topic)
            @include('topic.list-item', ['topic' => $topic])
        @endforeach

        <hr>

        {{ $topics->links() }}

    </div>

@endsection
