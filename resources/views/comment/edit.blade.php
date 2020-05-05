@extends('layouts.form')

@section('content')

    <div class="container layout-sidebar">

        <div class="my-4">
            <a href="{{ route('topic.show', ['topic' => $topic]) }}" class="btn-link">
                <i class="fas fa-arrow-left"></i>
                Back to topic
            </a>
        </div>

        <div class="layout-title">
            <div class="col">
                <h1>Edit comment</h1>
            </div>
        </div>

        <hr>

        <form action="{{ route('comment.update', ['comment' => $comment]) }}" method="post">
            @csrf
            @method('PUT')

            <input type="hidden" name="topic_id" value="{{ $topic->id }}">

            <textarea
                name="text"
                class="w-100"
                placeholder="Write your comment here..."
                cols="10"
                rows="5"
                required
            >{{ $comment->text }}</textarea>

            <button
                type="submit"
                class="btn btn-primary mt-3"
            >
                <i class="fas fa-check"></i>
                Save
            </button>

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

    </div>

@endsection
