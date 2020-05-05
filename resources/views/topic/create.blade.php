@extends('layouts.form')

@section('content')

    <div class="container layout-sidebar">

        <div class="my-4">
            <a href="{{ route('topic.index') }}" class="btn-link">
                <i class="fas fa-arrow-left"></i>
                Back to list
            </a>
        </div>

        <div class="layout-title">
            <h1>Create topic</h1>
        </div>

        <hr>

        <form action="{{ route('topic.store') }}" method="post">
            @csrf
            @method('POST')

            <div class="form-group">
                <label for="topic-create-title">Title</label>
                <input
                    type="text"
                    class="form-control"
                    id="topic-create-title"
                    placeholder="Title"
                    name="title"
                    required
                >
            </div>

            <div class="form-group">
                <label for="topic-create-category">Category</label>
                <select
                    class="form-control"
                    id="topic-create-category"
                    name="category_id"
                    required
                >
                    @foreach($topic_categories as $category)
                        <option value="{{ $category->id }}">
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

@endsection
