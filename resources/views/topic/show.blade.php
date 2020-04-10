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
                        confirm-button-text="Delete"
                        confirm-button-class="btn btn-danger"
                    >
                        <div class="btn btn-link text-danger" slot="reference">
                            Delete topic
                        </div>
                        Are you sure want to delete "{{ $topic->title }}"?
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

        <div class="card mb-3">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <h5 class="card-title">{{ $topic->title }}</h5>
                        <p class="card-text">
                            <span class="text-muted">Author:</span>
                            <a href="#">{{ $topic->author->name }}</a>
                            <span class="text-muted">&bull;</span>
                            <span class="text-muted">Category:</span>
                            <a href="#">{{ $topic->category->name }}</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>

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
