@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="layout-thumbnail">
            <img src="{{ $topic->thumbnail }}/1200x500" class="mouse-parallax">

            <div class="layout-back-btn">
                <a href="{{ route('topic.index') }}" class="btn">
                    <i class="fas fa-arrow-left"></i>
                    Back to list
                </a>
            </div>

            <div class="layout-title">

                <h1>{{ $topic->title }}</h1>

                <div class="layout-title__actions">
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
                        <a href="{{ route('topic.edit', ['topic' => $topic]) }}" class="btn btn-primary ml-3">
                            Edit topic
                        </a>
                    @endcan
                </div>

            </div>
        </div>

        <div class="d-flex">
            <div>
                @if($comments->isEmpty())
                    <p class="text-muted">Your comment will be first :)</p>
                @endif

                @foreach($comments as $comment)
                    @include('comment.list-item', ['comment' => $comment])
                @endforeach

                <form
                    action="{{ route('comment.store') }}"
                    method="POST"
                    style="margin-left: 55px;"
                >
                    @csrf
                    @method('POST')

                    <input type="hidden" name="topic_id" value="{{ $topic->id }}">

                    <textarea
                        name="text"
                        class="w-100"
                        placeholder="Write your comment here..."
                        cols="10"
                        rows="5"
                        required
                    ></textarea>

                    <button
                        type="submit"
                        class="btn btn-primary mt-3"
                    >
                        Submit
                        <i class="fas fa-arrow-up"></i>
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
            <div class="layout-sidebar">

                <h3>Author</h3>

                <a
                    class="d-flex align-items-center mb-5"
                    href="{{ route('user.show', ['user' => $topic->author]) }}"
                >
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
                            <small class="mt-1">{{ $topic->created_at->format('j F, Y') }}</small>
                        </div>
                    </div>
                </a>

                <div class="mb-5">
                    <h3>Category:</h3>
                    <a
                        href="{{ route('category.show', ['category' => $topic->category]) }}"
                        class="btn"
                    >
                        {{ $topic->category->name }}
                    </a>
                </div>

                <div class="mb-5">
                    <h3>Users</h3>

                    @foreach($users as $user)
                        <a
                            class="d-flex mb-3"
                            href="{{ route('user.show', ['user' => $user]) }}"
                        >
                            <div class="user-avatar user-avatar--{{ $user->color }}">
                                <div class="user-avatar__initials">
                                    {{ $user->initials }}
                                </div>
                            </div>
                            <div class="user-avatar__name">
                                <div class="color-{{ $user->color }}">
                                    {{ $user->name }}
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>

            </div>
        </div>

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
