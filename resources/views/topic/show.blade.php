@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="my-4">
            <a href="{{ route('topic.index') }}" class="btn-link">
                <i class="fas fa-arrow-left"></i>
                Back to list
            </a>
        </div>

        <div class="row align-items-center">
            <div class="col">
                <h1>{{ $topic->title }}</h1>
            </div>
            <div class="col-auto">
                @can('delete', $topic)
                    <confirm-action
                        @confirm="$refs['form-topic-delete'].submit()"
                        title="Are you sure want to delete '{{ $topic->title }}'?"
                    >
                        <div class="btn btn-link text-danger" slot="reference">
                            Delete topic
                        </div>
                    </confirm-action>
                @endcan
                @can('update', $topic)
                    <a href="{{ route('topic.edit', ['topic' => $topic]) }}" class="btn btn-primary">
                        Edit topic
                    </a>
                @endcan
            </div>
        </div>

        <hr>

        <div class="card-text d-flex align-items-center">
            <div class="d-flex">
                <div class="user-avatar user-avatar--{{ $topic->author->color }}">
                    <div class="user-avatar__initials">
                        {{ $topic->author->initials }}
                    </div>
                </div>
                <div class="user-avatar__name">
                    <div class="color-{{ $topic->author->color }}">
                        {{ $topic->author->name }}
                    </div>
                    <small class="mt-1">at {{ $topic->created_at->format('j F, Y') }}</small>
                </div>
            </div>
            <span class="text-muted mx-3">&bull;</span>
            <div>
                <span class="text-muted">Category:</span>
                <a href="#">{{ $topic->category->name }}</a>
            </div>
        </div>

        <hr>

        @if($comments->isEmpty())
            <p class="text-muted">Your comment will be first :)</p>
        @endif

        @foreach($comments as $comment)
            @include('comment.list-item', ['comment' => $comment])
        @endforeach

        <hr>

        <div class="d-flex align-items-center justify-content-between">
            <div>
                <h5 class="card-title">Comment topic</h5>
            </div>
        </div>

        <form action="{{ route('comment.store') }}" method="POST">
            @csrf
            @method('POST')

            <input type="hidden" name="topic_id" value="{{ $topic->id }}">

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <textarea
                            name="text"
                            class="form-control"
                            placeholder="Write your comment here..."
                            cols="10"
                            rows="5"
                            required
                        ></textarea>
                    </div>
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary">
                        Submit
                        <i class="fas fa-arrow-up"></i>
                    </button>
                </div>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0 pl-3">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

        </form>

        <form
            method="POST"
            class="d-none"
            ref="form-comment-delete"
        >
            @csrf
            @method('DELETE')
        </form>

        <form
            action="{{ route('topic.destroy', ['topic' => $topic]) }}"
            method="POST"
            class="d-none"
            ref="form-topic-delete"
        >
            @csrf
            @method('DELETE')
        </form>

    </div>

@endsection
