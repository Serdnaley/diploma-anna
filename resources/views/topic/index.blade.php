@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="layout-title">

            <h1>All topics</h1>

            <div class="layout-title__actions">
                <a href="{{ route('topic.create') }}" class="btn btn-link">
                    Create topic
                </a>
            </div>

        </div>

        <div class="list">
            @foreach($topics as $topic)
                @include('topic.list-item', ['topic' => $topic])
            @endforeach
        </div>

        <hr>

        {{ $topics->links() }}

    </div>

@endsection
