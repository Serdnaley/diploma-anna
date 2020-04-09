@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row align-items-center mt-5">
            <div class="col">
                <h1>All topics</h1>
            </div>
            <div class="col-auto">
                <a href="{{ route('topic.create') }}" class="btn btn-primary">
                    Create topic
                </a>
            </div>
        </div>

        <hr>

        @foreach($topics as $topic)

        <div class="card mb-3">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <h5 class="card-title">{{ $topic->title }}</h5>
                        <p class="card-text">
                            <span class="text-muted">Author:</span>
                            <a href="{{ route('user.show', ['user' => $topic->author]) }}">
                                {{ $topic->author->name }}
                            </a>
                            <span class="text-muted">&bull;</span>
                            <span class="text-muted">Category:</span>
                            <a href="{{ route('topic_category.show', ['topic_category' => $topic->category]) }}">
                                {{ $topic->category->name }}
                            </a>
                            <span class="text-muted">&bull;</span>
                            <a href="{{ route('topic.edit', ['topic' => $topic]) }}">
                                Edit
                            </a>
                        </p>
                    </div>
                    <a href="{{ route('topic.show', ['topic' => $topic]) }}" class="btn btn-link">
                        Show more
                    </a>
                </div>
            </div>
        </div>

        @endforeach

        <hr>

        {{ $topics->links() }}

    </div>

@endsection
