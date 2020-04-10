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
                <h1>Edit topic</h1>
            </div>
            <div class="col-auto">
                <a href="{{ route('topic.show', ['topic' => $topic]) }}" class="btn btn-primary">
                    View topic
                </a>
                <confirm-action
                        @confirm="$refs['form-topic-delete'].submit()"
                        confirm-button-text="Delete"
                        confirm-button-class="btn btn-danger"
                >
                    <div class="btn btn-outline-danger" slot="reference">
                        Delete
                    </div>
                    Are you sure want to delete "{{ $topic->title }}"?
                </confirm-action>
            </div>
        </div>

        <hr>

        <div class="card mb-3">
            <div class="card-body">
                <form action="{{ route('topic.update', ['topic' => $topic]) }}" method="post">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="topic-create-title">Title</label>
                        <input type="text" class="form-control" id="topic-create-title" name="title"
                               value="{{ $topic->title }}">
                    </div>

                    <div class="form-group">
                        <label for="topic-create-category">Category</label>
                        <select class="form-control" id="topic-create-category" name="category_id">
                            @foreach($topic_categories as $category)
                                <option value="{{ $category->id }}" {{ $topic->category_id === $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
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

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
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
