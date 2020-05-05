@extends('layouts.form')

@section('content')

    <div class="container layout-sidebar">

        <div class="my-4">
            <a href="{{ route('category.index') }}" class="btn-link">
                <i class="fas fa-arrow-left"></i>
                Back to list
            </a>
        </div>

        <div class="layout-title">
            <h1>Create topic category</h1>
        </div>

        <hr>

        <form
            action="{{ route('category.store') }}"
            method="post"
        >
            @csrf
            @method('POST')

            <div class="form-group">
                <label for="category-create-name">Name</label>
                <input
                    type="text"
                    class="form-control"
                    id="category-create-name"
                    placeholder="Category name"
                    name="name"
                    required
                >
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

            <button
                type="submit"
                class="btn btn-primary"
            >
                Create category
            </button>
        </form>

    </div>

@endsection
